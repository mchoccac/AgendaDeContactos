/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.msoftware;


import java.io.*;
import javax.servlet.*;
import javax.servlet.http.*;

import com.msoftware.business.User;
import com.msoftware.data.UserIO;

public class AddToEmailListServlet extends HttpServlet
{    
    protected void doPost(HttpServletRequest request, 
                          HttpServletResponse response) 
                          throws ServletException, IOException
    {
        // get parameters from the request
        String firstName = request.getParameter("firstName");
        String lastName = request.getParameter("lastName");
        String emailAddress = request.getParameter("emailAddress");

        // get a relative file name
        ServletContext context = getServletContext();
        String path = context.getRealPath("/WEB-INF/EmailList.txt");

        // use regular Java classes
        User user = new User(firstName, lastName, emailAddress);
        UserIO.addRecord(user, path);
        
        // store the User object in the request object
        request.setAttribute("user", user);
        
        // forward request and response objects to JSP page
        String url = "/display_email_entry.jsp";
        RequestDispatcher dispatcher =
             getServletContext().getRequestDispatcher(url);
        dispatcher.forward(request, response);              
    }    
}
