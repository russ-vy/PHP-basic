<?php

$title = "PHP basics - Lesson 1";
$h1 = "PHP basics";
$currentYear = date("Y");
$task1 = "
  <h4>Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. Проверить, что все работает правильно.</h4>
  <div>Все установлено и работает. Необходимы рекомендации по настройке Atom</div>
";
$task2 = "
  <h4>Установить программное обеспечение: веб-сервер, базу данных, интерпретатор, текстовый редактор. Проверить, что все работает правильно.</h4>
  <div>По методичке все понятно</div>
";
$task3 = "
  <h4>Объяснить, как работает данный код:</h4>
  <div>
    \$a = 5;
    <br>\$b = '05';
    <br>var_dump(\$a == \$b);                     <b>// Почему true?</b>
    <br>var_dump((int)'012345');                  <b>// Почему 12345?</b>
    <br>var_dump((float)123.0 === (int)123.0);    <b>// Почему false?</b>
    <br>var_dump((int)0 === (int)'hello, world'); <b>// Почему true?</b>
  </div>
  <h3>Результат выполнения:</h3>
  <div>
    bool(true)        - неявное преобразование типов \$b = 5
    <br>int(12345)    - явное преобразование типов
    <br>bool(false)   - строгое сравнение, не соответствуют типы
    <br>bool(true)    - строка, которая начинается с букв, преобразуется в 0
  </div>
";
$task4 = "
  <h4>Используя имеющийся HTML-шаблон, сделать так, чтобы главная страница генерировалась через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title и текущий год генерировались в блоке контента из созданных переменных.</h4>
  <div>Собственно текущая страница и является выполненным заданием (Если я его правильно понял)</div>
";
$task5 = "
  <h4>*Используя только две переменные, поменяйте их значение местами. Например, если a = 1, b = 2, надо, чтобы получилось b = 1, a = 2. Дополнительные переменные использовать нельзя.</h4>
  <div>
    Собственно вот один из методов. Правда решение не мое. Google помог:
    <table>
      <tbody>
        <tr>
          <td style='text-align: center;'><strong>Операция</strong></td>
          <td style='text-align: center;'><strong>a</strong></td>
          <td style='text-align: center;'><strong>b</strong></td>
        </tr>
        <tr>
          <td style='text-align: center;'>\$a = \$a + \$b</td>
          <td style='text-align: center;'>1</td>
          <td style='text-align: center;'>2</td>
        </tr>
        <tr>
          <td style='text-align: center;'>\$b = \$b – \$a</td>
          <td style='text-align: center;'>1 + 2</td>
          <td style='text-align: center;'>2</td>
        </tr>
        <tr>
          <td style='text-align: center;'>\$b = -\$b</td>
          <td style='text-align: center;'>1 + 2</td>
          <td style='text-align: center;'>2 – 1 – 2 = -1</td>
        </tr>
        <tr>
          <td style='text-align: center;'>\$a = \$a – \$b</td>
          <td style='text-align: center;'>1 + 2</td>
          <td style='text-align: center;'>1</td>
        </tr>
        <tr>
          <td style='text-align: center;'></td>
          <td style='text-align: center;'>1 + 2 – 1 = 2</td>
          <td style='text-align: center;'>1</td>
        </tr>
      </tbody>
    </table>
  </div>
";

$template = "

<!DOCTYPE html>
<html lang=\"en\">
<head>
  <meta charset=\"UTF-8\">
  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
  <title>$title</title>
  <style type=\"text/css\">
   b {
     margin-left: 5rem;
   }
  </style>
</head>
<body>
  <h1>$h1</h1>
  <span>$currentYear год</span>
  <ol>
    <li>$task1</li>
    <li>$task2</li>
    <li>$task3</li>
    <li>$task4</li>
    <li>$task5</li>
  </ol>
</body>
</html>

";

echo $template;
