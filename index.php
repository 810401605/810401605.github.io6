
```php
// Set up the cURL request
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, "https://api.openai.com/v1/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{
  "model": "text-davinci-003",
  "prompt": "'.$text.'",
  "max_tokens": 2048
}');
curl_setopt($ch, CURLOPT_POST, 1);
 
// Set the API key as an HTTP header
$headers = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Authorization: Bearer 你的KEY";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
 
// Send the request and parse the response
$response = curl_exec($ch);
$response_data = json_decode($response, true);

 
if (curl_errno($ch)) {
  // If there was an error executing the cURL request, print it out
  echo 'Error: ' . curl_error($ch);
} else {

    $result = array(
        'code'=> 200,
        'msg'=>"获取成功",
        'data'=>array(
            'html'=> $response_data['choices'][0]['text'],
            'title'=>$text
        ),
    );
    echo json_encode($result,320);
    exit();
  
}
 
curl_close($ch);
————————————————
版权声明：本文为CSDN博主「這花開嗎」的原创文章，遵循CC 4.0 BY-SA版权协议，转载请附上原文出处链接及本声明。
原文链接：https://blog.csdn.net/qq_43047232/article/details/128458316
