<%@page import="java.sql.Statement"%>
<%@page import="java.sql.ResultSet"%>
<%@page import="java.sql.DriverManager"%>
<%@page import="java.sql.Connection"%>
<%@page import="java.text.SimpleDateFormat"%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Bootstrap -->
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="bootstrap/dist/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
        
		<link href="favicon.ico" rel="shortcut icon" type=>
        
		<script src="jquery/jquery-1.12.4.min.js"></script>
        <script src="bootstrap/dist/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

        <link rel="stylesheet" type="text/css" href="DataTables/datatables.css">
        <script type="text/javascript" charset="utf8" src="DataTables/datatables.js"></script>
         
        <!-- /Bootstrap -->
        <title>CINES</title>
    </head>
    <body>
        
        <% request.setCharacterEncoding("UTF-8");
          Class.forName("com.mysql.jdbc.Driver");
          Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/crudcine", "root", "123456");
          Statement s = conexion.createStatement();
          ResultSet selecPelis = s.executeQuery("SELECT nompeli, codpeli,despeli FROM peliula");

        %>
        <div class="container">
                <div class="page-header">
                         <h1>Modificar o Eliminar</h1>
                </div>
        </div>  

        <table id="table_id" class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>
                           Codigo
                        </th>
                        <th>
                            Nombre
                        </th>
                        <th>
                            Descripcion
                        </th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <% while (selecPelis.next()) { %>
                    <tr>
                        <td>
                            <%out.println("<b>" + selecPelis.getString("codpeli") + "</b>");%>
                            
                        </td>
                        <td>
                            <%out.println("<b>" + selecPelis.getString("nompeli") + "</b>");%>
                        </td>
                        <td>
                            <%out.println("<b>" + selecPelis.getString("despeli") + "</b>");%>
                        </td>
                        <td>
                            <form method="get" action="modificaPelicula.jsp">
                                    <button class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                        Modificar
                                    </button>
                                    <input type="hidden" name="codpeli" value="<%=selecPelis.getInt("codpeli")%>"/>
                                    <input type="hidden" name="nompeli" value="<%=selecPelis.getString("nompeli")%>"/>
                                    <input type="hidden" name="despeli" value="<%=selecPelis.getString("despeli")%>"/>
                            </form>
                        </td>
                        <td>
                            <form method="get" action="borradaPelicula.jsp">
                                    <button class="btn btn-danger">
                                     <span class="glyphicon glyphicon-trash"></span>
                                        Eliminar
                                    </button>
                                    <input type="hidden" name="codpeli" value="<%=selecPelis.getInt("codpeli")%>"/>
                            </form>
                        </td>
                    </tr>
                     <%   } %>
                </tbody>
        </table>

        <%  s.close();%>  
        
    <script type="text/javascript">
        $(document).ready( function () {
            $('#table_id').DataTable({
                responsive: true
            });
        });
    </script>  

    </body>

</html>
