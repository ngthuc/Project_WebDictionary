<?php

/**
 * Lớp chi hội: Mô tả cấu trúc một chi hội hoặc đơn vị tương đương, không bao gồm chi hội sinh viên
 * Coder; Lê Minh Luân
 * Date; 04/08/2017
 */
class DictionaryObj
{
    private $word;
    private $types;
    private $meaning;
    private $description;
    private $lesson;

    //Thêm một dữ liệu kiểu chuổi vào cho mot tu
    public function setWord($word)
    {
        $this->word = $word;
    }
    //Trả ra dữ liệu kiểu chuỗi của tu
    public function getWord()
    {
        return $this->word;
    }
    public function setTypes($types)
    {
        $this->types = $types;
    }
    //Trả ra dữ liệu kiểu chuỗi của tu
    public function getTypes()
    {
        return $this->types;
    }

    //Thêm một dữ liệu kiểu chuỗi y nghia 1 tu
    public function setMeaning($meaning)
    {
        $this->meaning = $meaning;
    }

    //Trả ra dữ liệu kiểu chuỗi y nghia 1 tu
    public function getMeaning()
    {
        return $this->Meaning;
    }
    //Thêm một dữ liệu kiểu chuỗi mot ta
    public function setDescription($des)
    {
        $this->description = $des;
    }

    //Trả ra dữ liệu kiểu chuỗi mo ta
    public function getDescription()
    {
        return $this->description;
    }
    //Them du lieu bai hoc
    public function setLesson($les)
    {
        $this->lesson = $les;
    }

    //Trả ra dữ liệu kiểu chuỗi bai hoc
    public function getLesson()
    {
        return $this->lesson;
    }

    //Nhận dữ liệu cho tất cả các trường của tu
    public function setDictionary($word,$types, $meaning,$description,$lesson)
    {
       $this->setWord($word);
        $this->types = $types;
       $this->setMeaning($meaning);
       $this->setDescription($description);
       $this->setLesson($lesson);
    }

    //Trả về dữ liệu kiểu đối tượng tu
    public function getDictionary()
    {
        return $this;
    }

}

?>