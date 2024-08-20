<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAW1 - PHP FIRST EXO</title>

    <style>
        table,
        th,
        tr,
        td,
        caption{
            border: 1px solid black;
        }

        td,
        th{
            padding: 5px;
        }

        table{
            border-collapse: collapse;
        }

        caption{
            font-weight: bold;
            padding: 10px 0;
        }
    </style>
</head>
<body>
    <table>
        <caption>Tableau des skills</caption>

        <tr>
            <th></th>
            <th>HTML</th>
            <th>PHP (base)</th>
            <th>PHP (avec OO)</th>
        </tr>
        <?php
            $file = 'skills.csv';
            $stream = fopen($file, 'r');

            if ($stream != FALSE)
            {
                while (($row = fgetcsv($stream, null, ';')) != FALSE)
                {
                    ?> <tr> <?php
        
                    foreach ($row as $value)
                    {
                        ?> <td><?=$value?></td> <?php
                    }

                    ?> </tr> <?php
                }
            }
        ?>
    </table>
</body>
</html>