# bd
componets/Autoload.php
  Служит для автоматического подключения классов контроллеров и моделей
componets/Db.php
  содержит единственную функцию getConnection - подключение к базе данных, 
  возвращает PDO
componets/Router.php
  метод run служит для выделения имени контроллера и его метода из URL, а вызова выделенного метода
controller/BikeController
  контроллер обрабатывающий запросы связаные с bike
model/Bike
  Модель таблицы bikes
  getBikeList() 
    обращается к базе и возвращает массив велосипедов со статусом ready 
   
    
  
