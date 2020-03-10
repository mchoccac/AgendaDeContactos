<%-- index.jsp --%>
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
			<!-- /Bootstrap -->
                    <title>CINES</title>
		</head>
	<body>
		<!-- navbar -->
        <nav class="navbar navbar-default">
            <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.jsp"></a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="nuevaPelicula.jsp">Nueva película</a></li>
                        <li><a href="seleccionPeliculaDatatable.jsp">Modificar/eliminar película</a></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
                
		<!-- container -->
		<div class="container">
			<div class="page-header">
	 			 <h1>¿Dónde ver mi pelicula favorita?</h1>
			</div>
		</div>
		<div class="container">
			<div class="panel panel-primary">
				<!-- Table -->
				<table class="table table-striped table-responsive table table-hover">
					<tr class="panel-primary">
                                                <th>
                                                        Película
                                                </th>
						<th>
							Descripción
						</th>
						<th>
							Fecha
						</th>
						<th>
							Lugar
						</th>
						<th>
							Ciudad
						</th>
						<th>
                                                    <div class="col-md-2">
                                                    <form method="get" action="seleccionDatable.jsp">
                                                        <button type="submit"  class="btn btn-success">
                                                            nuevo evento
                                                        </button>
                                                    </form>
                                                </div>
						</th>
                                        </tr>
                                            <%
                                                Class.forName("com.mysql.jdbc.Driver");
                                                Connection conexion = DriverManager.getConnection("jdbc:mysql://localhost:3306/crudcine", "root", "123456");
                                                Statement c = conexion.createStatement();
                                                ResultSet listacine = c.executeQuery("SELECT * FROM peliula JOIN evento on (peliula.codpeli = evento.codpelicula) order by 1");
                                                int repetida = -1;
                                                while (listacine.next()) {
                                                    if (repetida != listacine.getInt("codpeli")) {
                                                        out.println("<td>"+ listacine.getString("nompeli") + "</td>");
                                                        if (listacine.getString("despeli") != null) {
                                                            out.println("<td>"+ listacine.getString("despeli") + "</td>");
                                                        } else { 
                                                            out.println("<td></td>"); 
                                                        }
                                                    } else {
                                                        out.println("<td></td><td></td>");
                                                    }
                                                    out.println("<td>"+ listacine.getDate("fecpeli") + "</td>");
                                                    out.println("<td>" + listacine.getString("lugar") + "</td>");
                                                    out.println("<td>" + listacine.getString("ciudad") + "</td>");
                                                    %>
                                                                                                        
                                                    <td><div class="row">
                                                      <div class="col-md-1"></div>
                                                 <!--   BOTON MODIFICAR EVENTO -->
                                                     <div class="col-md-3">
                                                    <form method="get" action="modificaEvento.jsp">
                                                        <input type="hidden" name="ciudad" value="<%=listacine.getString("ciudad") %>"/>
                                                        <input type="hidden" name="fecpeli" value="<%=listacine.getDate("fecpeli") %>"/>
                                                        <input type="hidden" name="lugar" value="<%=listacine.getString("lugar") %>"/>
                                                        <input type="hidden" name="nompeli" value="<%=listacine.getString("nompeli") %>"/>
                                                        <input type="hidden" name="codevento" value="<%=listacine.getInt("codevento") %>"/>
                                                        <input type="hidden" name="codpelicula" value="<%=listacine.getInt("codpelicula") %>"/>
                                                        <button type="submit"  class="btn btn-info">
                                                            <span class="glyphicon glyphicon-pencil"></span>
                                                        </button>
                                                    </form>
                                                </div>

                                                 <!--    BOTON BORRAR EVENTO -->

                                                        <div class="col-md-2">
                                                    <form method="get" action="borrarEvento.jsp">
                                                        <input type="hidden" name="codevento" value="<%=listacine.getInt("codevento") %>"/>
                                                        <button type="submit" class="btn btn-danger">
                                                            <span class="glyphicon glyphicon-trash"></span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>   
                                            </td></tr>
                                            <%
                                               repetida = listacine.getInt("codpeli");
                                                 } %>
                         
                                           <%     conexion.close();
                                            %>
				</table>                      
			</div>
		</div> 
                           
	</body>
</html>

