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
require_once '../config.php';
require_once '../Rekognition_API.php';
require_once '../Rekognition_GUI.php';

echo "Before analyzing:<br><br><img src='dataset/test.jpg'></img><br><br>";

$dir = "dataset/test.jpg";

global $rekognition;
$parsed_obj = $rekognition->GetMetadata($dir, Rekognition_API::REQUEST_DIR, Rekognition_API::RETURN_PARSED);

global $orbgui;
$orbgui->SetImage($dir);
$orbgui->DrawObjects($parsed_obj->GetFaces());

$base64_str = base64_encode($orbgui->GetImage());
echo "After analyzing:<br><br><img src='data:image/jpeg;base64,".$base64_str."' /><br><br>";


