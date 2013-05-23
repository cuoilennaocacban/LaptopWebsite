/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Methods;

import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author Hieu Trung
 */
public class Onlines {
    
    public static boolean increaseAccess() throws ClassNotFoundException, SQLException
    {
        return Connecting.submit("update thong_so_phu set gia_tri = gia_tri + 1 where ma_tsp = 'online' or ma_tsp = 'luong_truy_cap'");
    }
    public static String[] getOnline() throws ClassNotFoundException, SQLException
    {
        boolean increaseAccess = increaseAccess();
        String[] online = new String[2];
        ResultSet rs = Methods.Connecting.getData("select gia_tri from thong_so_phu where ma_tsp = 'luong_truy_cap' or ma_tsp = 'online'");
        while(rs.next())
        {
            online[rs.getRow() - 1] = rs.getString(1);
        }
        return online;
    }
    public static boolean outOnline() throws ClassNotFoundException, SQLException
    {
        return Connecting.submit("update thong_so_phu set gia_tri = gia_tri - 1 where ma_tsp = 'online'");
    }
}
