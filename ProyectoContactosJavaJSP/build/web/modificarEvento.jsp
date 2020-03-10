<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.Statement"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
      <% request.setCharacterEncoding("UTF-8"); %>
    <%
      Class.forName("com.mysql.jdbc.Driver");
      Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/crudcine", "root", "123456");
      Statement s = conexion.createStatement();
      s.execute("UPDATE evento SET ciudad = '" + request.getParameter("ciudad") +"' , fecpeli = '" + request.getParameter("fecpeli") +"' , lugar = '" + request.getParameter("lugar") +"' where codevento=" + request.getParameter("codevento"));

      s.close();
    %>
    <script>
        document.location = "index.jsp"
    </script>
  </body>
</html>