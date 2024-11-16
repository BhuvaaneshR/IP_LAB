/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/JSP_Servlet/Servlet.java to edit this template
 */

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Arrays;
import java.util.List;

/**
 *
 * @author lbhar
 */
@WebServlet("/StudentNameServlet")
public class StudentNameServlet extends HttpServlet {

    private static final List<String> studentNames = Arrays.asList(
            "BhanuPriya S", "Bharath Kumar L", "Bhargavi K", "Bhuvaanesh R", "Bhuvaneswari M", "Deepthi P", "Chanddraprakash S"
    );

    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String query = request.getParameter("query");

        List<String> matchingNames = new ArrayList<>();

        if (query != null && !query.trim().isEmpty()) {
            for (String name : studentNames) {
                if (name.toLowerCase().startsWith(query.toLowerCase())) {
                    matchingNames.add(name);
                }
            }
        }

        response.setContentType("application/json");
        PrintWriter out = response.getWriter();

        String jsonResponse = "[";

        for (int i = 0; i < matchingNames.size(); i++) {
            jsonResponse += "\"" + matchingNames.get(i) + "\"";
            if (i < matchingNames.size() - 1) {
                jsonResponse += ",";
            }
        }
        jsonResponse += "]";

        out.print(jsonResponse);
        out.flush();
    }
}