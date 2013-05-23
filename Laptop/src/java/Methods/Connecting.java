/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
package Methods;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

/**
 *
 * @author Hieu Trung
 */
public class Connecting {

    /**
     *
     * @param sql
     * @return
     * @throws ClassNotFoundException
     * @throws SQLException
     */
    public static ResultSet getData(String sql) throws ClassNotFoundException, SQLException {
        Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
        Connection conn = DriverManager.getConnection("jdbc:sqlserver://localhost:1433;databaseName=Laptop;user=sa;password=trunghiu9");
        PreparedStatement pps = conn.prepareStatement(sql);
        ResultSet rs = pps.executeQuery();
        return rs;
    }
    public static boolean submit(String sql) throws ClassNotFoundException, SQLException {
        Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
        Connection conn = DriverManager.getConnection("jdbc:sqlserver://localhost:1433;databaseName=Laptop;user=sa;password=trunghiu9");
        PreparedStatement pps = conn.prepareStatement(sql);
        return pps.execute();
    }
}
