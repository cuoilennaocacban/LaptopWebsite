package Methods;

import java.sql.ResultSet;
import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 *
 * @author Hieu Trung
 */
public class CheckUser {

    /**
     *
     * @param user
     * @param pass
     * @return
     */
    public static boolean checkUser(String user, String pass) {
        boolean isOk = false;
        try {
            ResultSet rs = Connecting.getData("SELECT ma_khach_hang,mat_khau FROM KHACH_HANG");
            while (rs.next()) {
                if ((user.equals(rs.getString("MA_KHACH_HANG"))) && (pass.equals(rs.getString("MAT_KHAU")))) {
                    isOk = true;
                }
            }
        } catch (Exception ex) {
            System.out.println(ex.toString());
        }
        return isOk;
    }

    public static boolean Loged(HttpServletRequest request, HttpServletResponse response) {
        String loged = "false";
        try {
            for (Cookie ck : request.getCookies()) {
                if (ck.getName().equals("loged")) {
                    loged = ck.getValue();
                }
            }
            if (loged.equals("true")) {
                return true;

            } else {
                return false;

            }
        } catch (Exception ex) {
            return false;
        }
    }
    
    public static boolean checkUserExist(String user) {
        boolean isOk = false;
        try {
            ResultSet rs = Connecting.getData("SELECT ma_khach_hang FROM KHACH_HANG");
            while (rs.next()) {
                if (user.equals(rs.getString("MA_KHACH_HANG"))) {
                    isOk = true;
                }
            }
        } catch (Exception ex) {
            System.out.println(ex.toString());
        }
        return isOk;
    }
}
