<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html>
<head>
    <title> JSP</title>
</head>

<body>
    <h1>Thanks for joining our email list</h1>

    <p>Here is the information that you entered:</p>

    <%@ page import="com.msoftware.business.User" %>
    <% User user = (User) request.getAttribute("user"); %>
    <table cellspacing="5" cellpadding="5" border="1">
        <tr>
            <td align="right">First name:</td>
            <td>CCCC<%= user.getFirstName() %></td>
        </tr>
        <tr>
            <td align="right">Last name:</td>
            <td>CCC<%= user.getLastName() %></td>
        </tr>
        <tr>
            <td align="right">Email address:</td>
            <td>CCC<%= user.getEmailAddress() %></td>
        </tr>
    </table>

  
    <form action="join_email_list.html" method="post">
        <input type="submit" value="Return">
    </form>

</body>
</html>