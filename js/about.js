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

// Обработчик события отправки формы
// document.getElementById("login-form").addEventListener("submit", function(e) {
//   e.preventDefault(); // Предотвращаем стандартное поведение отправки формы
//   let formData = new FormData(this); // Получаем данные формы
//   fetch(this.action, { // Отправляем POST запрос на сервер
//       method: 'POST',
//       body: formData
//   })
//   .then(response => response.text()) // Получаем текст ответа
//   .then(data => {
//       console.log(data); // Отладочный вывод ответа от сервера
//       if (data === "success") { // Если ответ успешный
//           // Закрываем модальное окно и перезагружаем страницу
//           document.getElementById("my-modal").classList.remove("open");
//           document.body.parentNode.classList.remove("no-scroll");
//           window.location.reload();
//       } else {
//           // Если ответ содержит ошибку, показываем её пользователю
//           console.log(data); // Здесь можно реализовать вывод ошибки на страницу
//       }
//   })
//   .catch(error => console.error('Error:', error)); // В случае ошибки выводим её в консоль
// });



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

// Слайдер

const galleryContainer = document.querySelector('.gallery-container');
const galleryControlsContainer = document.querySelector('.gallery-controls');
const galleryControls = ['предыдущий', 'следующий']; // Переведенные кнопки управления
const galleryItems = document.querySelectorAll('.gallery-item');

class Carousel {

  constructor(container, items, controls){
    this.carouselContainer = container;
    this.carouselControls = controls;
    this.carouselArray = [...items];
    this.startX = 0; // Начальная позиция прикосновения
    this.endX = 0; // Конечная позиция прикосновения
  }

  updateGallery(){
    this.carouselArray.forEach(el => {
      el.classList.remove('gallery-item-1');
      el.classList.remove('gallery-item-2');
      el.classList.remove('gallery-item-3');
      el.classList.remove('gallery-item-4');
      el.classList.remove('gallery-item-5');
    });

    this.carouselArray.slice(0, 5).forEach((el , i) => {
      el.classList.add(`gallery-item-${i+1}`);
    });
  }

  setCurrentState(direction) {
    if (direction.className == 'gallery-controls-предыдущий' || direction == 'right') {
        this.carouselArray.unshift(this.carouselArray.pop());
    } else {
        this.carouselArray.push(this.carouselArray.shift());
    }
    this.updateGallery();
  }

  setControls() {
    this.carouselControls.forEach(control => {
        galleryControlsContainer.appendChild(document.createElement('button')).className = `gallery-controls-${control}`;
        document.querySelector(`.gallery-controls-${control}`).innerText = control;
      });
    }

    useControls() {
        const triggers = [...galleryControlsContainer.childNodes];
        triggers.forEach(control => {
            control.addEventListener('click', e => {
                e.preventDefault();
                this.setCurrentState(control);
            });
        });

        setInterval(() => { // Автопрокрутка
            this.setCurrentState(triggers[1]); // Настройте индекс в зависимости от того, в каком направлении вы хотите автоматически прокручивать
        }, 4000); // Настройте временной интервал по мере необходимости
  }

  // Функции для обработки свайпа
  handleTouchStart(e) {
    this.startX = e.touches[0].clientX;
  }

  handleTouchMove(e) {
    this.endX = e.touches[0].clientX;
  }

  handleTouchEnd() {
    // Если разница больше 50, то считаем это свайпом
    if (this.startX - this.endX > 50) {
      // Свайп влево
      this.setCurrentState('left');
    } else if (this.startX - this.endX < -50) {
      // Свайп вправо
      this.setCurrentState('right');
    }
  }

  addSwipeListener() {
    this.carouselContainer.addEventListener('touchstart', e => this.handleTouchStart(e));
    this.carouselContainer.addEventListener('touchmove', e => this.handleTouchMove(e));
    this.carouselContainer.addEventListener('touchend', () => this.handleTouchEnd());
  }
}

const exampleCarousel = new Carousel(galleryContainer, galleryItems, galleryControls);

exampleCarousel.setControls();
exampleCarousel.useControls();
exampleCarousel.addSwipeListener(); // Добавляем слушатель свайпа



// Карта

ymaps.ready(init);
    function init(){
        var myMap = new ymaps.Map("map", {
            center: [47.237332, 39.712270],
            zoom: 16
        });
    }