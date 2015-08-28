1 задача 

решение:
Чтобы не создавать 100500 запросов в цикле, и не грузить систему, создаем запрос один раз, заполняем данными из массива в цикле и в конце выполняем этот запрос

$query = "INSERT INTO table2 (name, age) VALUES";
foreach($data as $item => $one) {
	$name = $one['name'];
	$age = $one['age'];
	$query .= "('$name', $age),";
}
$query = rtrim( $query, ',' );
$mysqli->query($query);

2 задача 

INSERT INTO table2 SELECT * FROM table1

