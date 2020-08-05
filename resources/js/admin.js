import $ from 'jquery';

let admin = document.querySelector('.admin_wrap');
import DroDown from './admin/DropDown';

if(admin) {
   let drop = document.querySelector('.dropdown');

   let dropdown = new DroDown(drop);
}
