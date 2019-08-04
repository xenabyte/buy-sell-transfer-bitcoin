<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Blockavel\LaraBlockIo\LaraBlockIoFacade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Mail;
use LaraBlockIo;
use Jimmerioles\BitcoinCurrencyConverter\Converter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        return view('home', ['wallet_balance' => $wallet_balance]);
    }
    public function profile()
    {
        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        return view('profile', ['wallet_balance' => $wallet_balance]);
    }
    public function wallets()
    {
        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        return view('wallets', ['wallet_balance' => $wallet_balance]);
    }
    public function sellBTC(Request $request)
    {
        //User data
        $user_id = Auth::user()->id;
        $username = Auth::user()->username;
        $email = Auth::user()->email;
        $labels = 'BitPro-User-'.$username;
        $investment_count = Auth::user()->investment_count;
        $btc_address = Auth::user()->btc_address;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        $this->validate($request, [
            'usd_selling_amount' => 'required|min:1',
            'paypal' => 'min:1',
            'payza' => 'min:1',
            'netella' => 'min:1',
            'giftcard' => 'min:1',
            'globalpayment' => 'min:1',
        ]);

        //SUMMING UP PENDING ADS
        $seller_info = DB::table('sellers')->Where([
            ['seller_user_id', '=', $user_id],
            ['merge_status', '=', 'pending'],
        ])->first();


        $usd_selling_amount = $request['usd_selling_amount'];
        $paypal = $request['paypal'];
        $payza = $request['payza'];
        $netella = $request['netella'];
        $giftcard = $request['giftcard'];
        $globalpayment = $request['globalpayment'];

        $selling_amount[] = $seller_info->selling_amount;

        $selling_balance = array_sum($selling_amount);
        $btc_selling_balance = to_btc($selling_balance, 'USD');

        $btc_selling_amount = to_btc($usd_selling_amount, 'USD');
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();
        //-------------------------SAVE RECORDS----------------------------
        if($btc_selling_balance <= $wallet_balance){
        DB::table('sellers')->insert([
            'seller_user_id' => $user_id,
            'seller_username' => $username,
            'seller_email' => $email,
            'seller_payment_mode' => $paypal.' '.$payza.' '.$netella.' '.$giftcard.' '.$globalpayment,
            'selling_amount' => $usd_selling_amount,
            'merge_status' => 'pending',
            'created_at' => $current_time,
        ]);

        //------------------------------------------------------------------
         return redirect()->route('wallets')->with('selling_message', 'Your selling ads have been created successfully');
        }else{
        //------------------------------------------------------------------
        return redirect()->route('wallets')->with('selling_er_message', 'Summation of pending selling ADS is greater than available balance in your wallet, consider deleting some ADS');
        }


    }
    public function userProfile($id)
    {
        return view('user_profile', ['user_id' => $id]);
        //-----------------------------------------------------------------
    }

    public function adminView($id)
    {
        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        return view('admin_view_user', [
            'user_id' => $id,
            'wallet_balance' => $wallet_balance,
        ]);
        //-----------------------------------------------------------------
    }
    public function buyingBTC(Request $request)
    {
        $this->validate($request, [
            'selling_id' => 'required|min:1',
        ]);

        $user_id = Auth::user()->id;
        $username = Auth::user()->username;
        $email = Auth::user()->email;
        $btc_address = Auth::user()->btc_address;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;
        $selling_id = $request['selling_id'];

        $selling_count_check = DB::table('sellers')->Where([
            ['id', '=', $selling_id],
            ['merge_status', '=', 'pending'],
        ])->take(1)->get();

        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $selling_count = count($selling_count_check);

        if($selling_count >= 1){

            //INSERTING BUYER INFORMATION
            DB::table('buyers')->insert([
                'buyer_user_id' => $user_id,
                'buyer_username' => $username,
                'buyer_email' => $email,
                'buyer_btc_address' => $btc_address,
                'created_at' => $current_time
            ]);

            //RETRIEVING buyer_info RECORDS
            $buyer_info =  DB::table('buyers')->where([
                ['buyer_user_id', '=', $user_id],
                ['seller_id', '=', NULL],
            ])->take(1)->first();

            $buying_id = $buyer_info->id;
            $buyer_user_id = $buyer_info->buyer_user_id;
            $buyer_username = $buyer_info->buyer_username;
            $buyer_email = $buyer_info->buyer_email;
            $buyer_btc_address = $buyer_info->buyer_btc_address;


            //RETRIEVING SELLING INFORMATION
            $seller_info = DB::table('sellers')->Where([
                ['id', '=', $selling_id],
                ['merge_status', '=', 'pending'],
            ])->take(1)->first();

            $seller_username = $seller_info->seller_username;
            $seller_user_id = $seller_info->seller_user_id;
            $seller_email = $seller_info->seller_email;
            $seller_payment_mode = $seller_info->seller_payment_mode;
            $selling_amount = $seller_info->selling_amount;


            DB::table('mergings')->insert([
                'buyer_id' => $buying_id,
                'buyer_user_id' => $buyer_user_id,
                'buyer_username' => $buyer_username,
                'buyer_email' => $buyer_email,
                'buyer_btc_address' => $buyer_btc_address,
                'seller_id' => $selling_id,
                'seller_user_id' => $seller_user_id,
                'seller_username' => $seller_username,
                'seller_email' => $seller_email,
                'seller_payment_mode' => $seller_payment_mode,
                'selling_amount' => $selling_amount,
                'merged_at' => $current_time,
                'created_at' => $current_time
            ]);

            //UPDATE BUYER TABLE
            DB::table('buyers')->where('id', '=', $buying_id)->update(['seller_id'=> $selling_id]);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['seller_username'=> $seller_username]);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['seller_user_id'=> $seller_user_id]);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['merge_status' => 'merged']);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['merge_at' => $current_time]);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['seller_email' => $seller_email]);


            //UPDATE SELLER TABLE
            DB::table('sellers')->where('id', '=', $selling_id)->update(['buyer_id' => $buying_id]);
            DB::table('sellers')->where('id', '=', $selling_id)->update(['merge_at' => $current_time]);
            DB::table('sellers')->where('id', '=', $selling_id)->update(['merge_status' => 'merged']);
            DB::table('sellers')->where('id', '=', $selling_id)->update(['buyer_user_id' => $buyer_user_id]);
            DB::table('sellers')->where('id', '=', $selling_id)->update(['buyer_username' => $buyer_username]);
            DB::table('sellers')->where('id', '=', $selling_id)->update(['buyer_email' => $buyer_email]);

            $seller_maildata = [
                'seller_name' => $seller_username,
                'seller_email' => $seller_email,
                'seller_amount' => $selling_amount,
                'buyer_name' => $buyer_username,
                'buyer_email' => $buyer_email
            ];

            Mail::send('emails.sellermail', $seller_maildata, function($message) use ($seller_maildata){
                $message->to($seller_maildata['seller_email'], $seller_maildata['seller_name'])->subject('BitPro Transaction');
            });

            $buyer_maildata = [
                'seller_name' => $seller_username,
                'seller_email' => $seller_email,
                'seller_amount' => $selling_amount,
                'buyer_name' => $buyer_username,
                'buyer_email' => $buyer_email
            ];

            Mail::send('emails.buyermail', $buyer_maildata, function($message) use ($buyer_maildata){
                $message->to($buyer_maildata['seller_email'], $buyer_maildata['seller_name'])->subject('BitPro Transaction');
            });

            return view('home', ['wallet_balance' => $wallet_balance]);

        }else{

            return view('home', ['wallet_balance' => $wallet_balance]);

        }

    }
    public function sellerConsent(Request $request)
    {
        $this->validate($request, [
            'merging_id' => 'required|min:1',
            'buyer_email' => 'required|min:1',
        ]);

        $merging_id = $request['merging_id'];
        $buyer_email = $request['buyer_email'];

        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;


        DB::table('mergings')->where('id', '=', $merging_id)->update(['seller_consent' => 'Deal']);

        return view('home', ['wallet_balance' => $wallet_balance]);
    }
    public function deleteInt(Request $request)
    {
        $this->validate($request, [
            'merging_id' => 'required|min:1',
            'selling_id' => 'required|min:1',
            'buying_id' => 'required|min:1',
            'buyer_email' => 'required|min:1',
        ]);

        $merging_id = $request['merging_id'];
        $buying_id = $request['buying_id'];
        $selling_id = $request['selling_id'];
        $buyer_email = $request['buyer_email'];

        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        DB::table('sellers')->where('id', '=', $selling_id)->update(['merge_status' => 'pending']);
        DB::table('sellers')->where('id', '=', $selling_id)->update(['merge_at' => NULL]);
        DB::table('buyers')->where('id', '=', $buying_id)->delete();
        DB::table('mergings')->where('id', '=', $merging_id)->delete();

        return view('home', ['wallet_balance' => $wallet_balance]);
    }
    public function confirmTx(Request $request)
    {
        $this->validate($request, [
            'merging_id' => 'required|min:1',
            'selling_id' => 'required|min:1',
            'buying_id' => 'required|min:1',
        ]);

        $merging_id = $request['merging_id'];
        $buying_id = $request['buying_id'];
        $selling_id = $request['selling_id'];

        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;


        return view('home', ['wallet_balance' => $wallet_balance]);
    }

    public function confirmPayment(Request $request)
    {
        $this->validate($request, [
            'merging_id' => 'required|min:1',
            'selling_id' => 'required|min:1',
            'seller_email'=> 'required|min:1',
            'buying_id' => 'required|min:1',
        ]);

        $merging_id = $request['merging_id'];
        $buying_id = $request['buying_id'];
        $seller_email = $request['seller_email'];
        $selling_id = $request['selling_id'];

        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        DB::table('sellers')->where('id', '=', $selling_id)->update(['payment_status' => 'Paid']);
        DB::table('buyers')->where('id', '=', $buying_id)->update(['payment_status' => 'Paid']);
        DB::table('mergings')->where('id', '=', $merging_id)->update(['payment_status' => 'Paid']);

        return view('home', ['wallet_balance' => $wallet_balance]);
    }

    public function confirmReceived(Request $request)
    {


         //--------------------CURRENT TIME--------------------------------
         $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $this->validate($request, [
            'merging_id' => 'required|min:1',
            'selling_id' => 'required|min:1',
            'buying_id' => 'required|min:1',
            'seller_email'=> 'required|min:1',
        ]);

        $merging_id = $request['merging_id'];
        $buying_id = $request['buying_id'];
        $selling_id = $request['selling_id'];
        $seller_email = $request['seller_email'];

        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $email = Auth::user()->email;
        $btc_address = Auth::user()->btc_address;
        $wallet_balance = $balance->data->available_balance;

        //RETRIEVING SELLING INFORMATION
        $merging_data = DB::table('mergings')->Where([
            ['id', '=', $merging_id],
            ['buyer_id', '=', $buying_id],
            ['seller_id', '=', $selling_id],
        ])->take(1)->first();


        $buyer_user_id = $merging_data->buyer_user_id;
        $buyer_username = $merging_data->buyer_username;
        $buyer_email = $merging_data->buyer_email;
        $buyer_btc_address = $merging_data->buyer_btc_address;
        $seller_username = $merging_data->seller_username;
        $seller_user_id = $merging_data->seller_user_id;
        $seller_email = $merging_data->seller_email;
        $seller_payment_mode = $merging_data->seller_payment_mode;
        $selling_amount = $merging_data->selling_amount;

        $charge_fee = 10;
        $charge = to_btc($charge_fee, 'USD');
        $amount = $selling_amount + $charge;

        //TRANSFER THE TO THE BUYER
        if($wallet_balance >= $amount){
            LaraBlockIo::withdrawFromAddressesToAddresses($selling_amount, $btc_address, $buyer_btc_address, $nonce = null);
            $transaction_label = 'BitPro-transaction-'.$buyer_username.'-'.$buying_id.'-'.$seller_username.'-'.$selling_id;

            DB::table('transactions')->insert([
                'transaction_label' => $transaction_label,
                'transaction_status' => 'Completed',
                'buyer_user_id' => $buyer_user_id,
                'buyer_username' => $buyer_username,
                'buyer_email' => $buyer_email,
                'buyer_btc_address' => $buyer_btc_address,
                'seller_user_id' => $seller_user_id,
                'seller_username' => $seller_username,
                'seller_email' => $seller_email,
                'seller_payment_mode' => $seller_payment_mode,
                'selling_amount' => $selling_amount,
                'created_at' => $current_time,
                'verified_at' => $current_time,
            ]);


            DB::table('sellers')->where('id', '=', $selling_id)->update(['pay_received_status' => 'Received']);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['pay_received_status' => 'Received']);
            DB::table('mergings')->where('id', '=', $merging_id)->update(['pay_received_status' => 'Received']);

            DB::table('sellers')->where('id', '=', $selling_id)->update(['transaction_status' => 'Completed']);
            DB::table('buyers')->where('id', '=', $buying_id)->update(['transaction_status' => 'Completed']);
            DB::table('mergings')->where('id', '=', $merging_id)->update(['transaction_status' => 'Completed']);

            return view('home', ['wallet_balance' => $wallet_balance]);
        }else{
            return redirect()->route('wallets')->with('selling_er_message', 'Insufficient funds, kindly topup to proceed with your transaction, and we advice you explain the delay to your buyer');
        }
    }

    public function withdrawBTC(Request $request)
    {
        //--------------------CURRENT TIME--------------------------------
        $current_time = \Carbon\Carbon::now()->toDateTimeString();

        $this->validate($request, [
            'btc_address' => 'required|min:1',
            'amount' => 'required|min:1',
        ]);

        $btc_address = $request['btc_address'];
        $amount = $request['amount'];
        $user_id = Auth::user()->id;
        $email = Auth::user()->email;
        $username = Auth::user()->username;
        $labels = 'BitPro-User-'.$username;
        $balance = LaraBlockIo::getAddressesBalanceByLabels($labels);
        $wallet_balance = $balance->data->available_balance;

        DB::table('payouts')->insert([
            'user_id' => $user_id,
            'username' => $username,
            'email' => $email,
            'user_label' => $labels,
            'amount' => $amount,
            'btc_address' => $btc_address,
            'status' => 'pending',
            'created_at' => $current_time,
        ]);

        //------------------------------------------------------------------
        return redirect()->route('wallets')->with('selling_message', 'Your withdrawal request is been proceed');
    }
}
