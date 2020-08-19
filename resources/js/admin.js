let admin = document.querySelector('.admin_wrap');
import DroDown from './admin/components/DropDown';

if(admin) {
   let drop = document.querySelector('.dropdown');
   new DroDown(drop);
}
