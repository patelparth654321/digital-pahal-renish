<?php


namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller as Controller;
use GuzzleHttp\Psr7\Request;

class BaseController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendResponse($result, $message)
    {
        $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
            'data' => []
        ];
        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    public function sendNotification(Request $request)
    {
        // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
            
        // $SERVER_API_KEY = env('FCM_SERVER_KEY');
    
        // $data = [
        //     "registration_ids" => $firebaseToken,
        //     "notification" => [
        //         "title" => $request->title,
        //         "body" => $request->body,  
        //     ]
        // ];
        // $dataString = json_encode($data);
      
        // $headers = [
        //     'Authorization: key=' . $SERVER_API_KEY,
        //     'Content-Type: application/json',
        // ];
      
        // $ch = curl_init();
        
        // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
                 
        // $response = curl_exec($ch);
    
        // return back()->with('success', 'Notification send successfully.');
    }
}
