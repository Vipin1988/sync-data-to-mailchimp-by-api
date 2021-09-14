<?php
            $apikey = '<put your key here>';
            $auth = base64_encode( 'user:'.$apikey );
            $birthday = '04/10'; // month/day formate
            $data = array(
                'apikey'        => $apikey,
                'email_address' => 'vipinkumar353@gmail.com',
                'status'        => 'subscribed',
                'merge_fields'  => array(
                    'FNAME' => 'vipin',
                    'LNAME' => 'kumar',
                    'PHONE' => '9990156554',
                    'BIRTHDAY' => $birthday ? date('m/d', strtotime($birthday)) : '',
                    //'TAGS' => array(['name' => 'web','status' => 'active']),
                    'ADDRESS' => (Object)[
                        'addr1' => 'testing',
                        //'addr2' => $contact->address2,
                        'city' => 'delhi',
                        'state' => 'delhi',
                        'zip' => '110093',
                        'country' => 'India',
                        'language' => 'Hindi',
                 ]
                )
            );
            $json_data = json_encode($data);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://us2.api.mailchimp.com/3.0/lists/<audience_id>/members/');
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
                                                        'Authorization: Basic '.$auth));
            curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 10);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);                                                                                                                  
            $result = curl_exec($ch);
            var_dump($result);
            die('Mailchimp executed');
?>