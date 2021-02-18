<?php
require "DBController.php";
class Auth {
    function getMemberByUsername($username,$company) {
        $db_handle = new DBController();
        $query = "Select * from members where `name` = ? AND `cname` = ?";
        $result = $db_handle->runQuery($query, 'ss', array($username,$company));
        return $result;
    }
    
	function getTokenByUsername($username,$company,$expired) {
	    $db_handle = new DBController();
	    $query = "Select * from tbl_token_auth where username = ? and cname = ? and is_expired = ?";
	    $result = $db_handle->runQuery($query, 'ssi', array($username,$company, $expired));
	    return $result;
    }
    
    function markAsExpired($tokenId) {
        $db_handle = new DBController();
        $query = "UPDATE tbl_token_auth SET is_expired = ? WHERE id = ?";
        $expired = 1;
        $result = $db_handle->update($query, 'ii', array($expired, $tokenId));
        return $result;
    }
    
    function insertToken($username, $random_password_hash, $company, $random_selector_hash, $expiry_date) {
        $db_handle = new DBController();
        $query = "INSERT INTO tbl_token_auth (username, password_hash, cname, selector_hash, expiry_date) values (?, ?, ?, ?,?)";
        $result = $db_handle->insert($query, 'sssss', array($username, $random_password_hash,$company, $random_selector_hash, $expiry_date));
        return $result;
    }
    
    function update($query) {
        mysqli_query($this->conn,$query);
    }
}
