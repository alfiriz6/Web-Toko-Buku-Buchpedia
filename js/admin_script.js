/* jshint esversion: 6 */
/* jshint -W033 */

let navbar = document.querySelector('.header .navbar');
let account_box = document.querySelector('.header .account-box');

document.querySelector('#menu-btn').onclick = () => {
   navbar.classList.toggle('active');
   account_box.classList.remove('active');
}

document.querySelector('#user-btn').onclick = () => {
   account_box.classList.toggle('active');
   navbar.classList.remove('active');
}

window.onscroll = () => {
   navbar.classList.remove('active');
   account_box.classList.remove('active');
}

document.querySelector('#close-update').onclick = () => {
   document.querySelector('.edit-book-form').style.display = 'none';
   window.location.href = 'admin_books.php';
}