<?php
$arrayCar = [
    ['Azla', 'Saga', 'Bezza', 'Iris'],
    ['1.0 Standard E MT', '1.0L Standard G (AT)', '1.0 Standard G MT', '1.3 Standard MT'],
    [23367, 32485, 34580, 36200],
];

function currency($number)
{
    return "RM " . number_format($number);  
}

//echo currency($arrayCar[2][0]);
?>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>

<table>
    <tr>
        <th>Model</th>
        <th>Variant</th>
        <th>Price</th>
    </tr>
    <?php
    for ($i = 0; $i < count($arrayCar[0]); $i++) {
        $arrayCar[2][$i] = currency($arrayCar[2][$i]);
    ?>
        <tr>
            <?php
            for ($j = 0; $j < count($arrayCar); $j++) {
            ?>
                <td><?php echo $arrayCar[$j][$i] ?></td>
            <?php
            }
            ?>
        </tr>
    <?php
    }
    ?>
</table> 