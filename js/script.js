/* jshint esversion: 6 */
/* jshint -W033 */

let user_box = document.querySelector('.header .header-1 .user-box');
let navbar = document.querySelector('.header .header-1 .navbar');

document.querySelector('#user-btn').onclick = () => {
   user_box.classList.toggle('active');
   navbar.classList.remove('active');
}

document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   user_box.classList.remove('active');
}

window.onscroll = () => {
   user_box.classList.remove('active');
   navbar.classList.remove('active');

   if (window.scrollY > 60) {
      document.querySelector('.header .header-1').classList.add('active');
   } else {
      document.querySelector('.header .header-1').classList.remove('active');
   }
}

let search_box = document.querySelector("#search");
let box_container = document.querySelector(".box-container");

if (search_box != null) {
   search_box.addEventListener("keyup", (e) => {
      let xhr = new XMLHttpRequest();
      xhr.onreadystatechange = () => {
         if (xhr.readyState == 4 && xhr.status == 200) {
            box_container.innerHTML = xhr.responseText;
         }
      };
      xhr.open("GET", "ajax/livesearch.php?search=" + search_box.value, true);
      xhr.send();
   });
} else {
   console.log("search_box tidak ditemukan");
}