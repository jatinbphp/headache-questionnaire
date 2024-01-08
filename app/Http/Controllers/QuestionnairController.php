<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;

class QuestionnairController extends Controller
{
    public function showQuestionsForm(Request $request){
        return view('questions');
    }

    public function getFormData(Request $request){
        $postData = $request->all();
        
        $yesCount = 0;
        $noCount = 0;
        // Loop through the que1 to que19 fields and count 'yes' and 'no' responses
        for ($i = 1; $i <= 19; $i++) {
            $fieldName = "que{$i}";
            if (isset($postData[$fieldName])) {

                if($fieldName!='que2'){
                    if ($postData[$fieldName] == 'yes') {
                        $yesCount++;
                    } elseif ($postData[$fieldName] == 'no') {
                        $noCount++;
                    }
                } else {
                    
                    if($postData[$fieldName] >= 6 ){
                        $yesCount++;
                    } else {
                        $noCount++;   
                    }
                }
            }
        }

        // Calculate percentages
        $totalResponses = $yesCount + $noCount;
        $score = $yesCount*2;
        $yesPercentage = ($totalResponses > 0) ? ($yesCount / $totalResponses) * 100 : 0;
        $noPercentage = ($totalResponses > 0) ? ($noCount / $totalResponses) * 100 : 0;

        $questionData['que1']  = 'Does the head ache comes out of the blue and is most painfull within one to 5 minutes of starting?';
        $questionData['que2']  = 'How severe is the head ache? 0 meaning no pain, and 10 meaning you wish you would rather die.';
        $questionData['que3']  = 'Is it usually the same kind of head ache, but it gets worse and worse every time you get a new attack?';
        $questionData['que4']  = 'Would you describe the head ache that bothers you as different fom past head ahes, or is it the same head ache?';
        $questionData['que5']  = 'Is the head ache always on the same side of the head?';
        $questionData['que6']  = 'Is the head ache triggeres physical activity';
        $questionData['que7']  = 'Is the head ache triggered by Coughing';
        $questionData['que8']  = 'Is the head ache tiggered by bending forward, or laying down';
        $questionData['que9']  = 'Is the head ache worse  when standing and less when lying';
        $questionData['que10']  = 'Does the head ache come at night, or in th early hours of the morning, or do you wake up with a head ache?';
        $questionData['que11']  = 'Do you wake up because of the head ahce?';
        $questionData['que12']  = 'Is it a new type head ache that started after age 50?';
        $questionData['que13']  = 'Are you suffering from some kind of systemic illness like blood pressure, Diabetes, or organ failure?';
        $questionData['que14']  = 'Is the head ache assosiated with any of the following:';
        $questionData['que15']  = 'Is the head ache assosiated with any of the following: Rash';
        $questionData['que16']  = 'Is the head ache associated with any of the following:  a Stiff neck';
        $questionData['que17']  = 'Is the head ache associated with any of the following: Uncontrollable jerking movements of the arms and legs,  Loss of consciousness or awareness or Cognitive or emotional symptoms, such as fear, anxiety or deja vu..';
        $questionData['que18']  = 'Is the head ache assosiceted with any of the following: Muscle tremors or uncontrolable muscle movements, srange sensation, numbness or ';
        $questionData['que19']  = 'Have you experienced a change in personality lately, e.g. more or less aggressive than normal, or difficulty with memmory?';
        Mail::send('survey_results', [ 'postData'=> $postData,'questionData'=>$questionData,'score'=>$score ], function ($message) {
            $message->from('info@admin.com', 'Headache');
            $message->to("gert@gsdm.co.za")->subject('New Form Submitted: '.date("Y-m-d"));
        }); 

        /*add user information into the session*/
        $this->setUserSession($request->all());
        

        // You can return these percentages as a response or use them as needed
        return response()->json([
            'yes_percentage' => $yesPercentage,
            'no_percentage' => $noPercentage,
            'score' => $score,
        ]);
    }

    public function setUserSession($data){
        $user = [
            'name'      => isset($data['name'])   ? $data['name']   : null,
            'number'    => isset($data['number']) ? $data['number'] : null,
            'email'     => isset($data['email'])  ? $data['email']  : null,
            'gender'    => isset($data['gender']) ? $data['gender'] : null,
            'age'       => isset($data['age'])    ? $data['age']    : null
        ];

        Session::put('user', $user);
    }
}
