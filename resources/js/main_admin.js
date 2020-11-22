let main_admin = document.querySelector('.admin_wrap');
import DroDown from './admin/components/DropDown';

if(main_admin) {
   let drop = document.querySelector('.dropdown');
   new DroDown(drop);
}
