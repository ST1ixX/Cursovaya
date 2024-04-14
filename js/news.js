document.addEventListener("DOMContentLoaded", (event) => {
  console.log("DOM полностью загружен и разобран");
});

const headerEl = document.getElementById("header");
// Бургер
document.addEventListener("DOMContentLoaded", function() {
  document.getElementById("burger").addEventListener("click", function() {
      headerEl.classList.toggle("open")
  })
})

// Шапка

window.addEventListener("scroll", function() {

const scrollPos = window.scrollY;

if(scrollPos > 100) {
  headerEl.classList.add("header_mini")
} else {
  headerEl.classList.remove("header_mini")
}

});

// Авторизация, вход

const authElement = document.getElementById("auth");

if (authElement) {
  authElement.addEventListener("click", function(e) {
      e.preventDefault();
      document.getElementById("my-modal").classList.add("open");
      document.body.parentNode.classList.add("no-scroll");
  });
}

document.getElementById("close-btn").addEventListener("click", function() {
  document.getElementById("my-modal").classList.remove("open");
  document.body.parentNode.classList.remove("no-scroll");
});

window.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
      document.getElementById("my-modal").classList.remove("open");
      document.body.parentNode.classList.remove("no-scroll");
  }
});

//Регистрация

document.getElementById("register__btn").addEventListener("click", function(e) {
e.preventDefault();
document.getElementById("my-modal").classList.remove("open")
document.getElementById("reg__modal").classList.add("open")
document.body.parentNode.classList.add("no-scroll")
});

document.getElementById("close-reg-btn").addEventListener("click", function() {
document.getElementById("reg__modal").classList.remove("open")
document.body.parentNode.classList.remove("no-scroll")
});

document.getElementById("reg_btn").addEventListener("click", function() {
document.getElementById("reg__modal").classList.remove("open")
document.body.parentNode.classList.remove("no-scroll")
});

window.addEventListener('keydown', (e) => {
if(e.key === 'Escape') {
  document.getElementById("reg__modal").classList.remove("open")
  document.body.parentNode.classList.remove("no-scroll")
}
})


// Новости
var adminBTN = document.getElementById("add_news");
var storeModal = document.getElementById("store__modal");
var storeCloseButton = document.getElementById("store-close-btn");
var addNews = document.getElementById("add_news_btn")

adminBTN.addEventListener("click", function(e) {
  e.preventDefault();
  storeModal.classList.add("open");
  document.body.classList.add("no-scroll");
});

storeCloseButton.addEventListener("click", function() {
    storeModal.classList.remove("open");
    document.body.classList.remove("no-scroll");
});

window.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
        storeModal.classList.remove("open");
        document.body.classList.remove("no-scroll");
    }
});
