<?php
class Join_tables{
    public static function load_comments($id){
        $db = Connect::getInstance();
        $className = get_called_class();
        $res = $db->query("SELECT korisnici.username, komentari.vest_id,komentari.comment_text, komentari.comment_time
                FROM komentari 
                LEFT JOIN korisnici ON komentari.user_id = korisnici.user_id 
                LEFT JOIN vest ON komentari.vest_id = vest.id_vest 
                WHERE vest.id_vest = $id ORDER BY komentari.comment_time DESC");
       if($res->rowCount() == 0){
            echo '<h3>Nema komentara za ovu vest</h3>';
            $arr = array();
            return $arr;
        }else{          
            $arr = array();
            while($r = $res->fetchObject($className)){
            $arr[] = $r;
            }
            return $arr;
        }
    }
    public static function all_comments($limit,$offset){
        $db = Connect::getInstance();
        $className = get_called_class();
        $res = $db->query("SELECT korisnici.username, vest.naslov,vest.slika,komentari.comment_id, komentari.comment_text
                FROM komentari 
                LEFT JOIN korisnici ON komentari.user_id = korisnici.user_id 
                LEFT JOIN vest ON komentari.vest_id = vest.id_vest ORDER BY komentari.comment_id DESC LIMIT " . $limit . " OFFSET " . $offset);
        $arr = array();
        while($r = $res->fetchObject($className)){
            $arr[] = $r;
        }
        return $arr;
    }
    public static function the_most_comments($category){
        $db = Connect::getInstance();
        $className = get_called_class();
        $res = $db->query("SELECT vest.naslov,vest.id_vest, (SELECT COUNT(komentari.vest_id) FROM komentari WHERE komentari.vest_id = vest.id_vest) AS br_komentara
            FROM komentari 
            LEFT JOIN vest ON komentari.vest_id = vest.id_vest
            WHERE vest.kategorija_id = $category
            GROUP BY vest.naslov ORDER BY br_komentara DESC;");
        $arr = array();
        while($r = $res->fetchObject($className)){
            $arr[] = $r;
        }
        return $arr;
    }
}