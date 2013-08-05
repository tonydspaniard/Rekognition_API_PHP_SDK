Current Version: 1.0
=======================

The folder contains our PHP SDKs and simple examples to demo the SDK.

The SDK contains the following functions:

// ReKognition Face Detect Function (the image you want to recognize the image)

<pre><code>public function RkFaceDetect($req, $scale, $request_mode = Rekognition_API::REQUEST_UNDEFINED, $return_mode = Rekognition_API::RETURN_JSON);
</code></pre>
// ReKognition Face Add Function

public function RkFaceAdd($req, $name, $scale, $request_mode = Rekognition_API::REQUEST_UNDEFINED, $return_mode = Rekognition_API::RETURN_JSON);
                            
// ReKognition Face Train Function

public function RkFaceTrain($return_mode = Rekognition_API::RETURN_JSON);

// ReKognition Face Recognize Function

public function RkFaceRecognize($req, $scale, $request_mode = Rekognition_API::REQUEST_UNDEFINED, $return_mode = Rekognition_API::RETURN_JSON);

// ReKognition Face Rename Function

public function RkFaceRename($tag, $new_tag, $return_mode = Rekognition_API::RETURN_JSON);

// ReKognition Face Crawl Function

public function RkFaceCrawl($access_token,$fb_id,$friend_id,$return_mode = Rekognition_API::RETURN_JSON);
                              
// ReKognition Face Visualize Function

public function RkFaceVisualize($name_list, $return_mode = Rekognition_API::RETURN_JSON);
                              
// ReKognition Face Search Function

public function RkFaceSearch($req, $scale, $request_mode = Rekognition_API::REQUEST_UNDEFINED, $return_mode = Rekognition_API::RETURN_JSON);
                              
// ReKognition Face Delete Function

public function RkFaceDelete($name, $id_list, $return_mode = Rekognition_API::RETURN_JSON);
                              
// ReKognition Face Stats Function

public function RkFaceStats($return_mode = Rekognition_API::RETURN_JSON);

// ReKognition Scene Understadning Function

public function RkSceneUnderstanding($req, $scale, $request_mode = Rekognition_API::REQUEST_UNDEFINED, $return_mode = Rekognition_API::RETURN_JSON);

Configuration:
=======================
(a) Register an API Key from https://www.rekognition.com/register/, and you will receive API key and secret by email.

(b) Use your own API Key, Secret, Name space and User id in config.php

$rekognition_api_key = '1234';
$rekognition_api_secret = '5678';
$rekognition_name_space = '';
$rekognition_user_id = ''; 

The ReKo SDK example:
=======================
(a) Image Request Example: Require the server with example/dataset and get the result back;

(b) Recognize the image using the our face detection and scene understanding functions;

For any questions, please contact eng@orbe.us
