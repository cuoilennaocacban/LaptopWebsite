/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Products;

/**
 *
 * @author Hieu Trung
 */
public class Description {
    public static String[] getDescription(String loai)
    {
        String[] des = null;
        switch(loai)
        {
            case("Laptop"):
                des = new String[] {"CPU", "HDD", "Card màn hình", "Màn hình", "Âm thanh", "Pin", "Màu - Chất liệu", "Tính năng", "Ổ đĩa", "Wifi", "Bluetooth", "USB", "Webcam", "Hệ điều hành"};
                break;
            case("Ram"):
                des = new String[] {"Dung lượng", "BUS", "Công nghệ"};
                break;
            case("CPU"):
                des = new String[] {"Xung nhịp", "Số core", "FSB", "Package", "Công nghệ", "Cache"};
                break;
            case("Pin"):
                des = new String[] {"Dung lượng", "Số cell", "Thời gian dùng"};
                break;
            case("HDD"):
                des = new String[] {"Dung lượng", "Cache", "Tốc độ"};
                break;
            case("Changer"):
                des = new String[] {"Input", "Output"};
                break;
        }
        return des;
    }
    
}
