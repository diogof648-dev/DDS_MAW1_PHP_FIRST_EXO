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
            text-align: center;
        }

        table{
            border-collapse: collapse;
            width: 100%;
        }

        caption{
            font-weight: bold;
            padding: 10px 0;
        }

        form{
            width: 30vw;
        }

        input[type='submit']{
            margin-top: 5px;
            width: 100%;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <form action="/update.php" method="post">
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
                    $rowNumber = 1;

                    while (($row = fgetcsv($stream, null, ';')) != FALSE)
                    {
                        ?> <tr> <?php

                        foreach ($row as $col => $value)
                        {
                            if ($col == 0)
                            {
                                ?>
                                <td>
                                    <?=$value?>
                                    <input type="hidden" name="name-<?=$rowNumber?>" value="<?=$value?>">
                                </td>
                                <?php
                            }
                            else
                            {
                                ?> <td><input type="number" name="skill-<?=$rowNumber?>-<?=$col?>" id="skill" min="1" max="4" value="<?=$value?>"></td> <?php
                            }
                        }

                        ?> </tr> <?php

                        $rowNumber++;   
                    }
                }
            ?>
        </table>
        <input type="submit" value="Sauvegarder">
    </form>
</body>
</html>