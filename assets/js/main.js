// Добавляем товары на страницу с помощью кнопки 'Показать ещё'
var btnShowMore = document.querySelector('#get-more');
var siteUrl = 'http://shop-master.local';
if (btnShowMore) {
  btnShowMore.onclick = function () {
    // Выбираем в переменую скрытый инпут
    var currentPageInput = document.querySelector("#current-page");

    var btnShowMore = document.querySelector('#get-more');
    var ajax = new XMLHttpRequest();
    ajax.open('GET', siteUrl + '/modules/products/get-more.php?page=' + currentPageInput.value, false);
    ajax.send();

    // Меняем его значение которое по умолчанию 1 прибавляем 1
    currentPageInput.value = +currentPageInput.value + 1;
    // Проверяем если запрос пустой удаляем кнопку со страницы
    if (ajax.response == "") {
      btnShowMore.style.display = "none";
    }
    var productsBlock = document.querySelector("#products");

    productsBlock.innerHTML = productsBlock.innerHTML + ajax.response;

  };
}

//Функция добавления через ajax запрос товара в корзину
function addToBasket(btn) {

  var ajax = new XMLHttpRequest();

  ajax.open("POST", siteUrl + '/modules/basket/add-basket.php', false);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send('id=' + btn.dataset.id);
  // alert('Click');

  // Преабразовываем запрос в JSON обьект
  var response = JSON.parse(ajax.response);
  console.dir(response);

  var btnGoBusket = document.querySelector("#count");

  // Подставляем число полученое с обьекта json сверху в корзину span
  btnGoBusket.innerText = response.count;

}

// Функционал удаления товара с корзины
function deleteProductBusket(obj, id) {

  var ajax = new XMLHttpRequest();
  ajax.open("POST", siteUrl + '/modules/basket/delete.php', false);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  ajax.send("id=" + id);
  obj.parentNode.parentNode.remove();
}

// Функционал редактирования количества товара и суммы
function editProductBasket(obj, id, cost) {

  var ajax = new XMLHttpRequest();
  ajax.open("POST", siteUrl + '/modules/basket/edit-count.php', false);
  ajax.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  //Передаём в POST запрос id товара, кол-во товра , и цену
  ajax.send("id=" + id + "&count=" + obj.value + "&cost=" + cost);

  //выбираем елемент с ценой товара и прибавляем к нему id товара который выбран
  var totalPrice = document.querySelector("#calc" + id);

  //Умножаем цену на кол-во товара
  var totalCost = obj.value * cost;
  // Выводим результат в елемент
  totalPrice.innerHTML = totalCost;

}