<?php

const NL = " <br>\n";

function gmp_sign($x){
	if ($x > 0) return 1;
	elseif ($x < 0) return -1;
	else return 0;
}

// 1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
// если $a и $b положительные, вывести их разность;
// если $а и $b отрицательные, вывести их произведение;
// если $а и $b разных знаков, вывести их сумму;
// Ноль можно считать положительным числом.

$a = 7;
$b = -9;

if ($a >= 0 && $b >= 0) {
	echo ( $a > $b ? $a : $b ) - ( $a < $b ? $a : $b );
} elseif ($a < 0 && $b < 0) {
	echo $a * $b;
} elseif (gmp_sign($a) <> gmp_sign($b)) {
	echo $a + $b;
} else {
	echo "Что-то пошло не так...";
}

echo "\n\n";
// 2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.

$а = rand(0, 15);

echo "a = $a", NL;

switch ($a) {
	case 0: echo 0, NL;
	case 1: echo 1, NL;
	case 2: echo 2, NL;
	case 3: echo 3, NL;
	case 4: echo 4, NL;
	case 5: echo 5, NL;
	case 6: echo 6, NL;
	case 7: echo 7, NL;
	case 8: echo 8, NL;
	case 9: echo 9, NL;
	case 10: echo 10, NL;
	case 11: echo 11, NL;
	case 12: echo 12, NL;
	case 13: echo 13, NL;
	case 14: echo 14, NL;
	case 15: echo 15, NL;
}

echo "\n";
// 3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.

function addition($x, $y){
	return $x + $y;
}

function subtraction($x, $y){
	return $x - $y;
}

function multiplication($x, $y){
	return $x * $y;
}

function division($x, $y){
	return $x / $y;
}

// 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation){
	switch ($operation) {
		case '+':
			return addition($arg1, $arg2);
		case '-':
			return subtraction($arg1, $arg2);
		case '*':
			return multiplication($arg1, $arg2);
		case '/':
			return division($arg1, $arg2);
		default:
			return "Что-то пошло не так...";
	}
}

echo "a = " . $a = rand(0, 100), NL
		,"b = " . $b = rand(), NL
		,"+ " . mathOperation($a, $b, "+"), NL
		,"- " . mathOperation($a, $b, "-"), NL
		,"* " . mathOperation($a, $b, "*"), NL
		,"/ " . mathOperation($a, $b, "/"), NL;


echo "\n";
// 5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.

// 6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

function power($val, $pow){
	if ($pow > 0) $val *= power($val, --$pow);
	elseif ($pow < 0) $val = 1 / power($val, abs($pow));
	else $val = 1;
	return $val;
};

echo power(2, 3), NL;

echo "\n";
// 7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
// 22 часа 15 минут
// 21 час 43 минуты

function getCurTime(){
	$hours = ['час', 'часа', 'часов'];
	$minutes = ['минута', 'минуты', 'минут'];

	function getEnding($num, $ending){
		if ($num >= 11 && $num <= 19) return $ending[2];
		else {
			$num %= 10;

			if ($num == 1) return $ending[0];
			elseif ($num >= 2 && $num <= 4) return $ending[1];
			else return $ending[2];
		}
	}

	$h = date('H');
	$m = date('i');
	return "$h " . getEnding($h, $hours) . " $m " . getEnding($m, $minutes);
}

echo getCurTime();
/*
0 часов минут
1 час   минута
2 часа  минуты
3
4
5 часов минут
6
7
8
9
10
	11
	12
	13
	14
	15
	16
	17
	18
	19
20
21 час    минута
22 часа   минуты
23
24
25 часов  минут
*/
