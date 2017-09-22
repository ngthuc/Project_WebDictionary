<?php
/**
 * Lớp chi hội: mô tả việc trao đổi dữ liệu với mysql
 * Coder: Lê Minh Luân
 * Date: 05/08/2017
 * Trạng thái: đã test
 */
require_once 'DictionaryObj.php';
require_once 'ConnectToSQL.php';
class DictionaryMod
{
    //Tạo ra một đối tượng cho phép dùng nó để giao tiếp với MySQL
    private $conn;

    function __construct()
    {
        $this->conn = new ConnectToSQL();
    }
    //*****************************************************
    // dem tong so tu da hoc
    public function countWord()
    {
        $sql = "SELECT count(*) FROM Dictionary";
        // Thực thi truy vấn
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);
        // Kiểm tra số lượng kết trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả, num_rows xem như biến chứa kết quả sau khi trả về
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //Cho vào list đối tượng
             //   echo $row["count(*)"];
                return $row["count(*)"];
            }
        } else {
          //  echo "error count account in branch";
            return -1;
        }

        //Ngắt kết nối
        $this->conn->Stop();
    }
    //dem so tu da hoc trong mot bai hoc
    public function countWordOnLesson($lesson)
    {
        $sql = "SELECT count(*) FROM Dictionary WHERE  lesson='".$lesson."'";
        // Thực thi truy vấn
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);
        // Kiểm tra số lượng kết trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả, num_rows xem như biến chứa kết quả sau khi trả về
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                //Cho vào list đối tượng
                //   echo $row["count(*)"];
                return $row["count(*)"];
            }
        } else {
            //  echo "error count account in branch";
            return -1;
        }

        //Ngắt kết nối
        $this->conn->Stop();
    }
    //******************************************************
    // Hàm trả về danh sách các tu hien co trong du lieu
    public function getListWord()
    {
        // Tạo ra một mảng lưu trữ tên list, mặc định bang đầu rỗng
        $list = array();
        // Đẩy câu lệnh vào string
        $sql = "SELECT (*) FROM Dictionary;";
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);

        // Kiểm tra số lượng kết quả trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
        if ($result->num_rows > 0) {
            // Sử dụng vòng lặp while để lặp kết quả
            $k = 0;
            //Tạo một đối tượng chứa
            $word = new DictionaryObj();
            while ($row = $result->fetch_assoc()) {

                //Cho vào list đối tượng
                $word->setWord($row['word']);
                $word->setTypes($row['types']);
                $word->setMeaning($row['meaning']);
                $word->setDescription($row['description']);
                $word->setLesson($row['lesson']);
                $list[$k] = $word;
                $k++;
			    }
        } else {
           // echo "Không có kết quả nào";
        }
        //Ngắt kết nối
        $this->conn->Stop();
        //Trả đối tượng đi, sau này lớp control sẽ sử dụng mảng này để truy xuất
        return $list;
    }
    // Hàm trả về danh sách các tu hien co trong du lieu
    public function getListWordtOnLesson($lesson)
    {
        // Tạo ra một mảng lưu trữ tên list, mặc định bang đầu rỗng
        $list = array();
        // Đẩy câu lệnh vào string
        $sql = "SELECT (*) FROM Dictionary WHERE lesson='".$lesson."';";
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);

        // Kiểm tra số lượng kết quả trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
        if ($result->num_rows > 0) {
            // Sử dụng vòng lặp while để lặp kết quả
            $k = 0;

            while ($row = $result->fetch_assoc()) {
                //Tạo một đối tượng chứa
                $word = new DictionaryObj();
                //Cho vào list đối tượng
                $word->setWord($row['word']);
                $word->setTypes($row['types']);
                $word->setMeaning($row['meaning']);
                $word->setDescription($row['description']);
                $word->setLesson($row['lesson']);
                $list[$k] = $word;
                $k++;
            }
        } else {
            // echo "Không có kết quả nào";
        }
        //Ngắt kết nối
        $this->conn->Stop();
        //Trả đối tượng đi, sau này lớp control sẽ sử dụng mảng này để truy xuất
        return $list;
    }
    // Hàm trả về danh sách các tu hien co trong du lieu
    public function getLesson()
    {
        // Tạo ra một mảng lưu trữ tên list, mặc định bang đầu rỗng
        $list = array();
        // Đẩy câu lệnh vào string
        $sql = "SELECT DISTINCT lesson FROM Dictionary;";
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);

        // Kiểm tra số lượng kết quả trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
        if ($result->num_rows > 0) {
            // Sử dụng vòng lặp while để lặp kết quả
            $k = 0;
            $list=array();
            //Tạo một đối tượng chứa
            while ($row = $result->fetch_assoc()) {

                //Cho vào list đối tượng
                $lesson=$row['lesson'];
                $list[$k] = $lesson;
                $k++;
            }
        } else {
            // echo "Không có kết quả nào";
        }
        //Ngắt kết nối
        $this->conn->Stop();
        //Trả đối tượng đi, sau này lớp control sẽ sử dụng mảng này để truy xuất
        return $list;
    }
    public function getTypes()
    {
        // Tạo ra một mảng lưu trữ tên list, mặc định bang đầu rỗng
        $list = array();
        // Đẩy câu lệnh vào string
        $sql = "SELECT DISTINCT types FROM Dictionary;";
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);

        // Kiểm tra số lượng kết quả trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
        if ($result->num_rows > 0) {
            // Sử dụng vòng lặp while để lặp kết quả
            $k = 0;
            $list=array();
            //Tạo một đối tượng chứa
            while ($row = $result->fetch_assoc()) {

                //Cho vào list đối tượng
                $lesson=$row['types'];
                $list[$k] = $lesson;
                $k++;
            }
        } else {
            // echo "Không có kết quả nào";
        }
        //Ngắt kết nối
        $this->conn->Stop();
        //Trả đối tượng đi, sau này lớp control sẽ sử dụng mảng này để truy xuất
        return $list;
    }
    public function getOnRequi($types,$lesson,$number)
    {
        // Tạo ra một mảng lưu trữ tên list, mặc định bang đầu rỗng
        $list = array();
        // Đẩy câu lệnh vào string
        if($types=='NoType' && $lesson=='NoLesson' && $number=='NoNumber')
            $sql = "SELECT * FROM Dictionary;";
        else if($types!='NoType' && $lesson=='NoLesson' && $number=='NoNumber')
            $sql = "SELECT * FROM Dictionary WHERE types='".$types."';";
        else if($types=='NoType' && $lesson!='NoLesson' && $number=='NoNumber')
            $sql = "SELECT * FROM Dictionary WHERE lesson='".$lesson."';";
        else if($types=='NoType' && $lesson=='NoLesson' && $number!='NoNumber')
            $sql = "SELECT * FROM Dictionary ORDER BY RAND() LIMIT ".$number.";";
        else if($types!='NoType' && $lesson!='NoLesson' && $number=='NoNumber')
            $sql = "SELECT * FROM Dictionary WHERE types='".$types."' AND lesson='".$lesson."';";
        else if($types=='NoType' && $lesson!='NoLesson' && $number!='NoNumber')
            $sql = "SELECT * FROM Dictionary WHERE lesson='".$lesson."' ORDER BY RAND() LIMIT ".$number.";";
        else if($types!='NoType' && $lesson=='NoLesson' && $number!='NoNumber')
            $sql = "SELECT * FROM Dictionary WHERE types='".$types."' ORDER BY RAND() LIMIT ".$number.";";
        else if($types!='NoType' && $lesson=='NoLesson' && $number!='NoNumber')
            $sql = "SELECT * FROM Dictionary WHERE types='".$types."' AND lesson='".$lesson."' ORDER BY RAND() LIMIT ".$number.";";
        else  $sql = "SELECT * FROM Dictionary;";
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);

        // Kiểm tra số lượng kết quả trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
        if ($result->num_rows > 0) {
            // Sử dụng vòng lặp while để lặp kết quả
            $k = 0;
            $list=array();
            while ($row = $result->fetch_assoc()) {
                //Tạo một đối tượng chứa
                $word = new DictionaryObj();
                //Cho vào list đối tượng
                $word->setWord($row['word']);
                $word->setTypes($row['types']);
                $word->setMeaning($row['meaning']);
                $word->setDescription($row['description']);
                $word->setLesson($row['lesson']);
                $list[$k] = $word;
                $k++;
            }
        } else {
            // echo "Không có kết quả nào";
        }
        //Ngắt kết nối
        $this->conn->Stop();
        //Trả đối tượng đi, sau này lớp control sẽ sử dụng mảng này để truy xuất
        return $list;
    }
    //*********************************************************
    //Hàm tìm kiếm một từ
    public function findWord($word)
    {
        // Tạo ra một mảng lưu trữ tên list, mặc định bang đầu rỗng
        $list = array();
        // Đẩy câu lệnh vào string
        $sql = "SELECT (*) FROM Dictionary WHERE word='".$word."';";
        $this->conn->Connect();
        $result = $this->conn->conn->query($sql);

        // Kiểm tra số lượng kết quả trả về có lơn hơn 0
        // Nếu lớn hơn tức là có kết quả, ngược lại sẽ không có kết quả
        if ($result->num_rows > 0) {
            // Sử dụng vòng lặp while để lặp kết quả
            $k = 0;
            //Tạo một đối tượng chứa
            $words = new DictionaryObj();
            while ($row = $result->fetch_assoc()) {

                //Cho vào list đối tượng
                $words->setWord($row['word']);
                $words->setTypes($row['types']);
                $words->setMeaning($row['meaning']);
                $words->setDescription($row['description']);
                $words->setLesson($row['lesson']);
                $list[$k] = $words;
                $k++;
            }
        } else {
            // echo "Không có kết quả nào";
        }
        //Ngắt kết nối
        $this->conn->Stop();
        //Trả đối tượng đi, sau này lớp control sẽ sử dụng mảng này để truy xuất
        return $list;
    }
    //Hàm tìm kiếm một chi hội theo ý nghĩa

    //Hàm thêm một từ
    public function addWord($word)
    {
        // Đẩy câu lệnh vào string
        $sql = "INSERT INTO Dictionary(word,types, meaning,description,lesson) VALUES('". $word->getWord() ."','".$word->getMeaning() ."','".$word->getDescription()."','".$word->getLesson() ."');";
        // Thực thi câu lệnh
        $this->conn->Connect();
        if ($this->conn->conn->multi_query($sql) === true) {
            //echo "Thêm thành công";
            //Ngắt kết nối
            $this->conn->Stop();
            return true;
        } else {
           // echo "Lỗi addbranch";
            //Ngắt kết nối
            $this->conn->Stop();
            return false;
        }

    }

    //Hàm xóa một từ
    public function deleteWord($word)
    {
        // Đẩy câu lệnh vào string

        $sql = "DELETE FROM Dictionary 
						WHERE word='" . $word->getWord() . "' AND types='" . $word->getTypes() . "';";
        // Thực thi câu lệnh
        // Thực hiện câu truy vấn
        $this->conn->Connect();
        if ($this->conn->conn->query($sql)) {
            //echo "Xóa thành công";
            //Ngắt kết nối
            $this->conn->Stop();
            return true;
        } else {
           // echo "Lỗi deletebranch";
            //Ngắt kết nối
            $this->conn->Stop();
            return false;
        }
    }

    //Hàm cập nhật một từ
    public function updateWord($word)
    {
        // Đẩy câu lệnh vào string
        $sql = "UPDATE Dictionary SET word = '".$word->getWord(). "' , types = '".$word->getTypes()."', meaning = '".$word->getMeaning(). "' ,description = '".$word->getDescription(). "' ,lesson = '".$word->getLesson(). "'  WHERE word='" . $word->getWord() . "' AND types='".$word->getTypes."';";
        // Thực thi câu lệnh
        // Thực hiện câu truy vấn
        $this->conn->Connect();
        if ($this->conn->conn->query($sql) === true) {
           // echo "Cập nhật thành công";
            //Ngắt kết nối
            $this->conn->Stop();
            return true;
        } else {
           // echo "Lỗi updatebranch";
            //Ngắt kết nối
            $this->conn->Stop();
            return false;
        }
    }

}
?>
