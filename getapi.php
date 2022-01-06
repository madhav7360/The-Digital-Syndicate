<?php
//
if (isset($_SERVER['SERVER_ADDR']) && isset($_SERVER['REMOTE_ADDR']))
{
    if ($_SERVER['REMOTE_ADDR'] != $_SERVER['SERVER_ADDR'])
    {
        exit('Access Denied');
    }
    date_default_timezone_set('Asia/kolkata');
$time = date('h:i:s a');
    $config = include __DIR__ . '/config.php';

    $con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);

    $query = 'select * from Subscriptions';
    $resultcheck = mysqli_query($con, $query);
    $rows = mysqli_fetch_all($resultcheck, MYSQLI_ASSOC);
    //                                                                     For 0 subscription
    if(empty($rows))

    {
        exit('Subscription list empty');
    }
    else
    {
        // monthly : 1
        // bimonthly : 1,15
        // weekly : 1,8,15,22,29


        // when date = 1 , qpi of all frequencies will be set
        // when date = 15, api of frequencies 1, 2, 3 are sent
        // when date = 8, 22, 29, api of frequency 1, 2 are sent
        // else api of frequency 1 is sent

        $date = date('d');
        if ($date == 1)
        {
            echo('qpi of all frequencies will be set');
            $query = 'select ApiId, Email  from Subscriptions group by ApiId';
        }
        
        elseif ($date == 15)
        {
            echo('qpi of  frequencies 1,2,3 will be set');
            $query = 'select ApiId  from Subscriptions where frequency = "1" or frequency = "2" or frequency = "3" group by ApiId';
        }
        elseif ($date == 8 || $date == 22 || $date == 29) 
        {
            echo('qpi of  frequencies 1,2 will be set');
            $query = 'select ApiId  from Subscriptions where frequency = "1" or frequency = "2" group by ApiId';
        }
        else
        {
            echo('qpi of  frequencies 1 will be set');
            $query = 'select Distinct ApiId from Subscriptions where frequency = 1';
        }


        //daily task
       
        $resultcheck = mysqli_query($con, $query);
        print_r($resultcheck);
         $apis = mysqli_fetch_all($resultcheck, MYSQLI_ASSOC);
         print_r($apis);
        
        

         $headers = array(
            'Authorization: Bearer ' . $config['API_KEY'],
            'Content-Type: application/json',
        );
        
        foreach ($apis as $api)
        {
            //GENERAL CODE FOR FETCHING JSON FROM URL OF EACH API
            //$url= $config[$api['ApiId']];
            //Fetching comic's details from generated url        
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // curl_setopt($ch, CURLOPT_URL, $url);
            // $res = curl_exec($ch);
            // curl_close($ch);
            // $response = json_decode($res);

            //SQL QUERY TO GET EMAIL ID LIST FOR EACH API  
            if ($date == 1)
            {
                $query = 'select Email from Subscriptions where apiId = '.$api['ApiId'];
            }
            
            elseif ($date == 15)
            {
                $query = 'select Email from Subscriptions where apiId = '.$api['ApiId'].'and frequency = "1" or frequency = "2" or frequency = "3" ';
            }
            elseif ($date == 8 || $date == 22 || $date == 29) 
            {
                $query = 'select Email from Subscriptions where apiId = '.$api['ApiId'].' and frequency = "1" or frequency = "2" group by ApiId';
            }
            else
            {
                $query = 'select Email from Subscriptions where apiId = '.$api['ApiId'].' and frequency = 1';
            }
            
            $resultcheck = mysqli_query($con, $query);
            $emails = mysqli_fetch_all($resultcheck, MYSQLI_ASSOC);
            // echo ($api['ApiId']); 
            echo ('<br>');
            // echo($config['api'][$api['ApiId']]['name']);
            echo ('<br>');
            // echo($config['api'][$api['ApiId']]['url']);

            $url = $config['api'][$api['ApiId']]['url'];
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            $res = curl_exec($ch);
            curl_close($ch);
            $response = json_decode($res);
            // CODE TO READ DATA AND DESIGN MAIL ACCORDING TO API ID

            $res_array = [];    //(Global) Stores required data from json as object 
            $count_res = 10;    //(Global) Fetches top 10 results
            $body = "";    //(Global)
            $name = "";
            $subject = "";

            switch ($api['ApiId'])
            {
            case 1 :        //For NYT News
                echo ('<br>');
                foreach($response->results as $result){
                    if($count_res !=0){         
                     array_push($res_array, (object)[
                         'title' => $result->title,
                         'url' => $result->url,
                         'abstract' => $result->abstract,
                         'byline' => $result->byline,
                     ]);
                     $count_res -=1;
                    }
                 }
                 $body = "<h2>Today's news,</h2> ";
                 $name = 'New York';
                 $subject = 'New York Times';

                 foreach($res_array as $arr){
                    $body .='<div style="width:50%"> <p><h2> ' .$arr->title.'</h2></p>
                    <p><h4> '. $arr->abstract .'</h4></p>
                    <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                    <p>  <i>'.$arr->byline.'</i></p>
                    <hr style="width:70%;text-align:left;margin-left:0"> </div>';
                }
                // print_r($body);
                echo ('fetch and design mail for api id 1');
                break;

            case 2 :        //For Guardian News
                echo ('<br>');
                foreach($response->response->results as $result){
                    if($count_res !=0){
                     array_push($res_array, (object)[
                         'title' => $result->webTitle,
                         'url' => $result->webUrl,
                         'date' => $result->webPublicationDate,
                     ]);
                     $count_res -=1;
                    }
                 }
                 $body = "<h2>Today's news,</h2> ";
                 $name = 'Guardian News';
                 $subject = 'Guardian News';

                 foreach($res_array as $arr){
                    $body .='<div style="width:50%"> <p><h2> ' .$arr->title.'</h2></p>
                    <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                    <p> Publication Date : <i>'.$arr->date.'</i></p>
                    <hr style="width:70%;text-align:left;margin-left:0"> </div>';
                }
                // echo($body);
                echo('fetch and design mail for api id 2');
                
                break;

            case 3:         //For InShorts News
                echo ('<br>');
                foreach($response->data as $result){
                    if($count_res !=0){
         
                     array_push($res_array, (object)[
                         'title' => $result->title,
                         'content' => $result->content,
                         'url' => $result->readMoreUrl,
                         'date' => $result->date,
                         'by' => $result->author,
                         'imgUrl' => $result->imageUrl,
                     ]);
                     $count_res -=1;
                    }
                 }
                 $body = "<h2>Today's news,</h2> ";
                 $name = 'InShorts News';
                 $subject = 'InShorts News';

                 foreach($res_array as $arr){
                    $body .='<div style="width:100%"> <p><h2> ' .$arr->title.'</h2></p>
                    <img alt="comic" src='.$arr->imgUrl.' style=width:500px;  />
                    <p> <h4>'.$arr->content.' </h4> </p>
                    <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                    <p> Publication Date : <i>'.$arr->date.'</i></p>
                    <p> By : <i>'.$arr->by.'</i></p>
                    <hr style="width:70%;text-align:left;margin-left:0"> </div>';        
                }
                // print_r($body);

                break;

            case 4:             //For NewsData.io News
                echo ('<br>');
                foreach($response->results as $result){
                    if($count_res !=0){
                        array_push($res_array, (object)[
                            'title' =>$result->title,
                            'content' =>$result->content,
                            'date' =>$result->pubDate,
                            'url' =>$result->link,
                            'imgUrl' =>$result->image_url,
                        ]);
                        $count_res -=1;
                    }
                }
                $body = "<h2>Today's news,</h2> ";
                $name = 'NewsData.io ';
                $subject = 'NewsData.io';

                foreach($res_array as $arr){
                    $body .='<div style="width:100%"> <p><h2> ' .$arr->title.'</h2></p>
                    <img alt="comic" src='.$arr->imgUrl.' style=width:500px;  />
                    <p> <h4>'.$arr->content.' </h4> </p>
                    <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                    <p> Publication Date : <i>'.$arr->date.'</i></p>
                    <hr style="width:70%;text-align:left;margin-left:0"> </div>';        
                }
                // print_r($body);
                break;

                case 5 :        //For Guardian Sports news
                    echo ('<br>');
                    foreach($response->response->results as $result){
                        if($count_res !=0){
                         array_push($res_array, (object)[
                             'title' => $result->webTitle,
                             'url' => $result->webUrl,
                             'date' => $result->webPublicationDate,
                         ]);
                         $count_res -=1;
                        }
                     }
                     $body = "<h2>Today's news,</h2> ";
                     $name = 'Guardian News';
                     $subject = 'Guardian News';
    
                     foreach($res_array as $arr){
                        $body .='<div style="width:50%"> <p><h2> ' .$arr->title.'</h2></p>
                        <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                        <p> Publication Date : <i>'.$arr->date.'</i></p>
                        <hr style="width:70%;text-align:left;margin-left:0"> </div>';
                    }
                    // echo($body);
                    echo('fetch and design mail for api id 2');
                    
                    break;

                    case 6:             //For NewsData.io Sports news
                        echo ('<br>');
                        foreach($response->results as $result){
                            if($count_res !=0){
                                array_push($res_array, (object)[
                                    'title' =>$result->title,
                                    'content' =>$result->content,
                                    'date' =>$result->pubDate,
                                    'url' =>$result->link,
                                    'imgUrl' =>$result->image_url,
                                ]);
                                $count_res -=1;
                            }
                        }
                        $body = "<h2>Today's news,</h2> ";
                        $name = 'NewsData.io ';
                        $subject = 'NewsData.io';
        
                        foreach($res_array as $arr){
                            $body .='<div style="width:100%"> <p><h2> ' .$arr->title.'</h2></p>
                            <img alt="comic" src='.$arr->imgUrl.' style=width:500px;  />
                            <p> <h4>'.$arr->content.' </h4> </p>
                            <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                            <p> Publication Date : <i>'.$arr->date.'</i></p>
                            <hr style="width:70%;text-align:left;margin-left:0"> </div>';        
                        }
                        // print_r($body);
                        break;
                    
                        case 7:         //For InShorts Sports news
                            echo ('<br>');
                            foreach($response->data as $result){
                                if($count_res !=0){
                     
                                 array_push($res_array, (object)[
                                     'title' => $result->title,
                                     'content' => $result->content,
                                     'url' => $result->readMoreUrl,
                                     'date' => $result->date,
                                     'by' => $result->author,
                                     'imgUrl' => $result->imageUrl,
                                 ]);
                                 $count_res -=1;
                                }
                             }
                             $body = "<h2>Today's news,</h2> ";
                             $name = 'InShorts News';
                             $subject = 'InShorts News';
            
                             foreach($res_array as $arr){
                                $body .='<div style="width:100%"> <p><h2> ' .$arr->title.'</h2></p>
                                <img alt="comic" src='.$arr->imgUrl.' style=width:500px;  />
                                <p> <h4>'.$arr->content.' </h4> </p>
                                <p> <a href='.$arr->url.'> <b>Click here to read full news.</b></a> </p>
                                <p> Publication Date : <i>'.$arr->date.'</i></p>
                                <p> By : <i>'.$arr->by.'</i></p>
                                <hr style="width:70%;text-align:left;margin-left:0"> </div>';        
                            }
                            // print_r($body);
            
                            break;
                        
                        case 8:
                            echo ('<br>');
                            foreach($response->results->books as $result){
                                if($count_res !=0){
                     
                                 array_push($res_array, (object)[
                                     'title' => $result->title,
                                     'description' => $result->description,
                                     'imgUrl' => $result->book_image,
                                     'purchase_url' => $result->amazon_product_url,
                                     'by' => $result->author,
                                     'publisher' => $result->publisher,
                                     'rank' => $result->rank,
                                 ]);
                                 $count_res -=1;
                                }
                             }
                             $body = "<h2>Ranked weekly books, </h2> ";
                             $name = 'New York Times Books';
                             $subject = 'New York Times Books';
                             
                             foreach($res_array as $arr){
                                $body .='<div style="width:100%"> <p><h2> ' .$arr->title.'</h2></p>
                                <img alt="comic" src='.$arr->imgUrl.' style=width:250px;  />
                                <p> <h4>'.$arr->description.' </h4> </p>
                                <p> Rank : <i>'.$arr->rank.'</i></p>
                                <p> <a href='.$arr->purchase_url.'> <b>Purchase book at Amazon</b></a> </p>
                                <p> Publisher : <i>'.$arr->publisher.'</i></p>
                                <p> By : <i>'.$arr->by.'</i></p>
                                <hr style="width:70%;text-align:left;margin-left:0"> </div>';
                            }

                            // print_r($body);

                            break;
                        
                        case 9:
                            echo ('<br>');
                            $content = $response->content;
                            $author = $response->author;
                            $date = $response->dateAdded;
                            $body = "<h1 style='margin-left:14px;'>Quote of the day, </h1> ";

                            $body.= '<div style="width:100%;  padding:30px; align-items:center; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6); border-radius: 15px; width: 600px; background-color: rgba(255, 255, 255, 0.3);  margin: 10px;
                            background-image: linear-gradient(to right bottom, rgb(255, 128, 128), #ffedbca8);">
                            <h1><span style="text-align: center; font-size: 40px;  font-weight: bold;">'.$content.'</span></h1>
                            <hr style="margin: 10px 0; width: 100%;  border: 1px solid black; background-color: black;">
                            <p style=" margin:10px;  text-align: right; font-size: 25px; font-style: italic;  font-family: cursive;"> ~ '.$author.'</p></div>';

                            $name = 'Quotable';
                            $subject = 'Quote of the day';

                            // print_r($body);
                            break;

                            case 10:
                            echo ('<br>');
                            $content = $response->content;
                            $author = $response->author;
                            $date = $response->dateAdded;

                            $name = 'They said so, ';
                            $subject = 'Quotes from They said so,';
                            $body = "<h1 style='margin-left:14px;'>Quote of the day, </h1> ";
    
                            $body.= '<div style="width:100%;  padding:30px; align-items:center;
                            background-image: linear-gradient(to right top, #d16ba5, #c777b9, #ba83ca, #aa8fd8, #9a9ae1, #8aa7ec, #79b3f4, #69bff8, #52cffe, #41dfff, #46eefa, #5ffbf1);">
                            <h1><span style="text-align: center; font-size: 40px;  font-weight: bold;">'.$quote.'</span></h1>
                            <hr style="margin: 10px 0; width: 100%;  border: 1px solid black; background-color: black;">
                            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.6); border-radius: 15px; width: 600px; background-color: rgba(255, 255, 255, 0.3);  margin: 10px;
                            <p style=" margin:10px;  text-align: right; font-size: 25px; font-style: italic;  font-family: cursive;"> ~ '.$author.'</p></div>';
    
                                
    
                            // print_r($body);
                            break;
                        
                        case 11:
                            echo ('<br>');
                            $imgUrl = $response->urls->regular;
                            $download = $response->links->download;
                            $likes =$response->likes;
                            $name =$response->user->username;
                            $portUrl =$response->user->portfolio_url;
                            $location =$response->user->location;
                            $webUrl = $response->links->html;

                            $name = 'Latest image from unsplash!';
                            $subject = 'Unsplash images';

                            $body ='<div style="width:80%;">
                            <img alt="unsplash" style="height:500px" src ='.$imgUrl.'/>
                            <div style="font-family: cursive; font-size:20px;"> 
                            <p> Likes: '.$likes.'</p>
                            <p> By: '.$name.'</p>
                            <p> Location : '.$location.'</p>
                            <a href='.$portUrl.'>↠ Portfolio ↞</a> </div>
                            <button style="padding:15px 25px; color:#fff;margin-top:10px; border:none; border-radius:2px; 
                            background-color:#e74c3c;font-family: cursive; font-weight:700; cursor: pointer;">
                            <h1>Latest image from unsplash!</h1> 
                            <a href='.$download.' style="text-decoration: none; color:white;">Download Image </a></button>';

                            // print_r($body);     
                            break;
                            
                        case 12:
                            echo ('<br>');
                            $title = $response->title;
                            $imgUrl = $response->url;
                            $author = $response->author;

                            $name = 'Wholesome memes';
                            $subject = 'Wholesome memes for you, ';

                            $body .= '<img src='.$imgUrl.' style="width:500px;" alt="memes from reddit"/>
                            <h3 style="margin-left:14px;">By '.$author.' ☺</h3> ';
                            
                            // print_r($body);
                            break;
            }     
            echo ('<br>');
            echo ('<br>');
            echo('api id = '.$api['ApiId']);
            echo ('<br>');
            echo($config['api'][$api['ApiId']]['name']);
            echo ('<br>');
            echo ('<br>');
            echo($name);
            echo ('<br>');
            echo($subject);
            echo ('<br>');
            echo($body);
            echo ('<br>');
            echo ('<br>');
            //LOOP OVER EMAIL IDS OF CORROSPONDING TO EACH API
              foreach ($emails as $email)
              {    
                   
                  echo($email['Email']);
                  echo ('<br>');
                  if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                { $link = 'https';}
           else
               { $link = 'http';}
           
           // Here append the common URL characters.
           $link .= '://';
           
           // Append the host(domain name, ip) to the URL.
           if(isset($_SERVER['HTTP_HOST']))
                $link .= $_SERVER['HTTP_HOST'];
           else
                exit('Error occured, HTTP_HOST not set');
           // Append file path and token
            $link .= "/the-digital-syndicate/unsubscribe.php?id=".$email['Email']."&apiId=".$api['ApiId']."&validation_hash=".md5($email['Email'].$config['KEY']);
            echo($link);
                  
                  $data = array(
                    'personalizations' => array(
                        array(
                        'to' => array(
                            array(
                                'email' => $email['Email']
                            )
                        )
                    )
                    ) ,
                    'from' => array(
                        'name' => $config['name'],
                        'email' => $config['from'],
                    ) ,
                    'subject' => $subject,
                    'content' => array(
                        array(
                             'type' => 'text/html',
                             'value' => $body.'<p> Click<a href='.$link.'> here </a> to unsubscribe</p>['.$time.'] End of message<p>',
                             ) 
                             ) ,
                    // 'attachments' => array(
                    //     array(
                    //         'content' => $base64str,
                    //         'type' => 'image/png',
                    //         'filename' => 'comic',
                    //         'disposition' => 'attachment',
                    //         'content_ID' => 'image-attachment',
                    //     ) ,
                    // ) ,
                );
        
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, 'https://api.sendgrid.com/v3/mail/send');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                echo($response);
                curl_close($ch);
                  //fetch and store data of apis corrosponding to apiid 
              }    
              echo ('<br>');echo ('<br>');
        }
    }
}