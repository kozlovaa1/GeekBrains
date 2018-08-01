<?php
/*1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.*/
echo 'Задание 1<br>';

$i = 0;
while ($i <= 100) {
    if ($i % 3 == 0) {
        echo $i . ', ';
    }
    $i++;
}
echo '<br>';
/*2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
0 – это ноль.
1 – нечетное число.
2 – четное число.
3 – нечетное число.
…
10 – четное число.*/
echo 'Задание 2<br>';

$i = 0;
do {
    if ($i == 0) {
        echo($i . ' - это ноль');
    } else if ($i % 2 == 0) {
        echo($i . ' - четное число');
    } else {
        echo($i . ' - нечетное число');
    }
    $i++;
} while ($i <= 10);
echo '<br>';
/*3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
Московская область:
Москва, Зеленоград, Клин
Ленинградская область:
Санкт-Петербург, Всеволожск, Павловск, Кронштадт
Рязанская область … (названия городов можно найти на maps.yandex.ru)*/
echo 'Задание 3<br>';

$cities = [
    'Московская область' => [
        'Москва', 'Зеленоград', 'Клин'
    ],
    'Ленинградская область' => [
        'Санкт-Петербург', 'Всеволожск', 'Павловск', 'Кронштадт'
    ],
    'Рязанская область' => [
        'Рязань', 'Касимов', 'Скопин'
    ]
];
foreach ($cities as $region => $city) {
    $result .= $region . ':<br>';
    foreach ($city as $key => $cityName) {
        $result .= $cityName . (($key < count($city) - 1) ? ', ' : '');
    }
    $result .= '<br>';
}
echo $result;

/*4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
Написать функцию транслитерации строк.*/
echo 'Задание 4<br>';

function translit($text)
{
    $alphabet = [
        'a' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'k' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'o' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '»',
        'ы' => 'y',
        'ь' => '‘',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];
    $arText = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
    $textResult = [];
    foreach ($arText as $symbol) {
        foreach ($alphabet as $key => $letter) {
            if ($symbol == $key) {
                $symbol = $letter;
            }

        }
        $textResult[] = $symbol;
    }
    return implode($textResult);
}

echo translit('привет, мир! съел бы щей.');
echo '<br>';
/*5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.*/
echo 'Задание 5<br>';

function space_change($text)
{
    $arText = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
    $textResult = [];
    foreach ($arText as $symbol) {
        if ($symbol == ' ') {
            $symbol = '_';
        }
        $textResult[] = $symbol;
    }
    return implode($textResult);
}

echo space_change('привет, мир! съел бы щей.');
echo '<br>';
/*6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.*/
echo 'Задание 6<br>';

$menu = [
    ['name' => 'home', 'link' => '/', 'submenu' => ''],
    ['name' => 'archive', 'link' => '/archive/', 'submenu' => [
        ['name' => 'archive1', 'link' => '/archive1/'],
        ['name' => 'archive2', 'link' => '/archive2/'],
    ]],
    ['name' => 'contact', 'link' => '/contact/', 'submenu' => ''],
];
?>
    <ul id="menu">
        <? foreach ($menu as $menuItem) {
            ?>
            <li>
                <a href="<?= $menuItem['link']; ?>"><?= $menuItem['name']; ?></a>
                <?
                if ($menuItem['submenu']) { ?>
                    <ul>
                        <? foreach ($menuItem['submenu'] as $subMenuItem) { ?>
                            <li>
                                <a href="<?= $subMenuItem['link']; ?>"><?= $subMenuItem['name']; ?></a>
                            </li>
                            <?
                        } ?>
                    </ul>
                    <?
                } ?>
            </li>
            <?
        }
        ?>
    </ul>
<?
echo '<br>';

/*7. *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно так:
for (…){ // здесь пусто}*/
echo 'Задание 7<br>';

for ($i = 0; $i <= 9; print $i++) {
}
echo '<br>';

/*8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».*/
echo 'Задание 8<br>';

$result = '';
foreach ($cities as $region => $city) {
    $result .= $region . ':<br>';
    $countTrueCities = 0;
    foreach ($city as $key => $cityName) {
        if (mb_substr($cityName, 0, 1) == 'К') {
            $mark = '';
            if ($countTrueCities > 0) {
                $mark = ', ';
            }
            $countTrueCities++;
            $result .= $mark . $cityName;
        }
    }
    $result .= '<br>';
}
echo $result;

/*9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).*/
echo 'Задание 9<br>';

function translit_and_space($text)
{
    $alphabet = [
        'a' => 'a',
        'б' => 'b',
        'в' => 'v',
        'г' => 'g',
        'д' => 'd',
        'е' => 'e',
        'ё' => 'yo',
        'ж' => 'zh',
        'з' => 'z',
        'и' => 'i',
        'й' => 'y',
        'k' => 'k',
        'л' => 'l',
        'м' => 'm',
        'н' => 'n',
        'o' => 'o',
        'п' => 'p',
        'р' => 'r',
        'с' => 's',
        'т' => 't',
        'у' => 'u',
        'ф' => 'f',
        'х' => 'kh',
        'ц' => 'ts',
        'ч' => 'ch',
        'ш' => 'sh',
        'щ' => 'shch',
        'ъ' => '»',
        'ы' => 'y',
        'ь' => '‘',
        'э' => 'e',
        'ю' => 'yu',
        'я' => 'ya',
    ];
    $arText = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
    $textResult = [];
    foreach ($arText as $symbol) {
        foreach ($alphabet as $key => $letter) {
            if ($symbol == $key) {
                $symbol = $letter;
            } elseif ($symbol == ' ') {
                $symbol = '_';
            }
        }
        $textResult[] = $symbol;
    }
    return implode($textResult);
}

echo translit_and_space('привет, мир! съел бы щей.');
?>