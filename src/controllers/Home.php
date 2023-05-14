<?php
    class Home extends Controllers{
        public function default(){
            $this->checkLogin();
            $this->view("home","Tổng quan","overView",[]);
        }
        public function overview(){
            $this->checkLogin();
            $this->view("home","Tổng quan","overView",[]);
        }
        public function thu(){
            $this->checkLogin();
            $this->view("home","Khoản thu","list",[]);
        }
        public function chi(){
            $this->checkLogin();
            $this->view("home","Khoản chi","list",[]);
        }
        public function account_info(){
            $this->checkLogin();
            $this->view("account_info", "Tài khoản", "account_info", []);
        }
        public function errors(){
            $this->view("not_found","404 not found",[]);
        }
    }
?>