<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Advanced Project Template Тестовое задание</h1>
    <br>
</p>

1. Реализовать сущности авторы и книги. Желательно использую БД с миграциями. (Выполнено используя миграции).
2. Реализовать административную часть:<br>
      <b>a.</b>CRUD операции для авторов и книг<br> 
      http://example.com/admin/authors/index - CRUD для авторов<br>
      http://example.com/admin/books/index - CRUD для книг<br>

      <b>b.</b>вывести список книг с обязательным указанием имени автора в списке.<br>
      http://example.com/admin/books/index - имеется вывод авторов каждой книги.<br>

      <b>с.</b>вывести список авторов с указанием кол-ва книг.<br>
      http://example.com/admin/authors/index - имеется колонка с кол-вом книг у каждого автора<br>

3. Реализовать публичную часть сайта с отображение авторов и их книг (простой вывод списка на странице):<br>
   http://example.com/ - вывод авторов и список их книг
   
4. http://test-yii2.local/admin/login - вход в backend, логин - admin, пароль - admin