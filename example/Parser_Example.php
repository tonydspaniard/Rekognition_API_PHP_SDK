<?php
/*
* Copyright (C) 2013 Orbeus Inc.
*
* Licensed under the Apache License, Version 2.0 (the "License");
* you may not use this file except in compliance with the License.
* You may obtain a copy of the License at
*
*      http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS,
* WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
* See the License for the specific language governing permissions and
* limitations under the License.
*/
//  Author: Tianqiang Liu - tqliu@orbe.us

$GLOBALS['REKOGNITION_ROOT'] = "../";
require_once '../Rekognition_Parser.php';

$response = new Rekognition_Parser('{"url":"\/opt\/lampp\/htdocs\/func\/upload\/images\/base64_h9ihK2.jpg","face_detection":[{"boundingbox":{"tl":{"x":823,"y":727.5},"size":{"width":230.33,"height":230.33}},"confidence":1,"eye_left":{"x":897.1,"y":812.6},"eye_right":{"x":988.5,"y":830.9},"nose":{"x":933.7,"y":867.4},"mouth l":{"x":897.1,"y":896.6},"mouth_l":{"x":897.1,"y":896.6},"mouth r":{"x":955.6,"y":904},"mouth_r":{"x":955.6,"y":904},"age":30.29,"smile":0.83,"glasses":0.96,"eye_closed":0.34,"mouth_open_wide":0.3,"sex":0.85}],"usage":{"quota":-631633,"status":"Succeed.","api_id":"1234"},"scene_understanding":[{"label":"Indoor","score":0.4804},{"label":"Restaurant","score":0.194}]}');

echo "--------Rekognition API for Google Glass Example!--------<br>";
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(<a href='https://rekognition.com'>Rekognition.com</a>, powered by <a href='http://orbe.us'>Orbeus Inc</a>)<br><br>";
echo "Get response general information:<br><br>";
if($response->GetAttribute('url', $value)){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;url:".$value."<br>";
}
echo "&nbsp;&nbsp;&nbsp;&nbsp;usage information:<br>";
foreach($response->GetAllUsageInfo() as $key => $val) {
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$key.":".$val."<br>";
}
echo "<br>------------------------------------------------------------<br>";

echo "Parsed JSON string and we got ".$response->GetFacesNum()." faces from Rekognition server.<br><br>";

echo "&nbsp;&nbsp;&nbsp;&nbsp;Read the information of the 1st face:<br>";
$response->GetFace(0, $face);

$face->GetAttribute("confidence", $attr_val);
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;confidence to be a face:".$attr_val."<br>";

echo "<br>Featured points:<br><br>";
if($face->GetFeaturedPoint('eye_left',$x,$y)) {
  echo '&nbsp;&nbsp;&nbsp;&nbsp;Try to get a feature point by key:<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;eye_left:'.$x.",".$y."<br><br>";
}

echo '&nbsp;&nbsp;&nbsp;&nbsp;Get all the feature points:<br>';
foreach($face->GetFeaturedPoints() as $key=>$val) {
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$key.":".$val->GetX().",".$val->GetY()."<br>";
}

echo '<br>&nbsp;&nbsp;&nbsp;&nbsp;Get all the attrabutes:<br><br>';
foreach($face->GetAttributes() as $key=>$val) {
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$key.":".$val."<br>";
}
/*
echo "<br>Guess names:<br>";
for($i = 0; $i < $face->GetNamesNum(); $i++) {
  $face->GetName($i, $first_name, $first_prob);
  echo "&nbsp;&nbsp;&nbsp;&nbsp;".$first_name.":".$first_prob."<br>";
}
*/
echo "<br>------------------------------------------------------------<br>";
echo "Scene understanding result:<br><br>";
for($i = 0; $i < $response->GetSceneLabelsNum(); $i++) {
  if($response->GetSceneLabel($i, $label, $score)) {
    echo "&nbsp;&nbsp;&nbsp;&nbsp;".$label.":".$score."<br>";
  }
}


