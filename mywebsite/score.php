<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <title>Scores</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="Pimp your tables with CSS3" />
        <meta name="keywords" content="table, css3, style, beautiful, fancy, css"/>
        <link rel="stylesheet" href="css/style_score.css" type="text/css" media="screen"/>
    </head>
    <style>
        *{
            margin:0;
            padding:0;
        }
        body{
            font-family: Georgia, serif;
            font-size: 20px;
            font-style: italic;
            font-weight: normal;
            letter-spacing: normal;
            background: #f0f0f0;
        }
        #content{
            background-color:#fff;
            width:950px;
            padding:40px;
            margin:0 auto;
            border-left:30px solid #1D81B6;
            border-right:1px solid #ddd;
            -moz-box-shadow:0px 0px 16px #aaa;
        }
        /*.head{
            font-family:Helvetica,Arial,Verdana;
            text-transform:uppercase;
            font-weight:bold;
            font-size:12px;
            font-style:normal;
            letter-spacing:3px;
            color:#888;
            border-bottom:3px solid #f0f0f0;
            padding-bottom:10px;
            margin-bottom:10px;
        }
        .head a{
            color:#1D81B6;
            text-decoration:none;
            float:right;
            text-shadow:1px 1px 1px #888;
        }
        .head a:hover{
            color:#f0f0f0;
        }*/
        #content h1{
            font-family:"Trebuchet MS",sans-serif;
            color:#1D81B6;
            font-weight:normal;
            font-style:normal;
            font-size:56px;
            text-shadow:1px 1px 1px #aaa;
        }
        #content h2{
            font-family:"Trebuchet MS",sans-serif;
            font-size:34px;
            font-style:normal;
            background-color:#f0f0f0;
            margin:40px 0px 30px -40px;
            padding:0px 40px;
            clear:both;
            float:left;
            width:100%;
            color:#aaa;
            text-shadow:1px 1px 1px #fff;
        }

    </style>
    <body>
        <div id="content">
		<?php include 'blue.php'?>
            <h1>Pimp Your Tables with CSS3</h1>
            
            <h2>Semester one</h2>
            <table class="table3">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">My Score</th>
                        <th scope="col" abbr="Medium">Average Score</th>
                        <th scope="col" abbr="Business">Highest Score</th>
                        <th scope="col" abbr="Deluxe">Is Passed</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="row">Average Score</th>
                        <td>2.90</td>
                        <td>5.90</td>
                        <td>9.90</td>
                        <td><span class="check"></span></td>
                    </tr>
                </tfoot>
                <tbody>
                    <tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td><span class="check"></span></td>
                    </tr>
                </tbody>
            </table>

        </div>
    <?php include 'nav.php'?> 
    </body>
</html>