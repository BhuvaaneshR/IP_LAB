import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

public class servv extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        // Set the response content type
        response.setContentType("text/html");

        // Get the form data from the request
        String name = request.getParameter("name");
        String rollNo = request.getParameter("roll-no");
        String gender = request.getParameter("gender");
        String year = request.getParameter("year");
        String department = request.getParameter("dept");
        String section = request.getParameter("sec");
        String mobileNo = request.getParameter("mob-no");
        String email = request.getParameter("mail");
        String address = request.getParameter("address");
        String city = request.getParameter("city");
        String country = request.getParameter("country");
        String pincode = request.getParameter("pincode");

        // Prepare the response HTML
        PrintWriter out = response.getWriter();
        out.println("<html><head><title>Course Registration</title>");
        out.println("<link rel='icon' type='image/png' href='icon.png'>");
        out.println("<style>");
        out.println("body { font-family: Arial, sans-serif; padding: 20px; }");
        out.println("h2 { color: #333; }");
        out.println("</style></head>");
        out.println("<body>");
        out.println("<h2>Course Registration Details</h2>");
        out.println("<table><tr><td><b>Student Name</b></td><td>: " + name + "</td></tr>");
        out.println("<tr><td><b>Roll No</b></td><td>: " + rollNo + "</td></tr>");
        out.println("<tr><td><b>Gender</b></td><td>: " + gender + "</td></tr>");
        out.println("<tr><td><b>Year</b></td><td>: " + year + "</td></tr>");
        out.println("<tr><td><b>Department</b></td><td>: " + department + "</td></tr>");
        out.println("<tr><td><b>Section</b></td><td>: " + section + "</td></tr>");
        out.println("<tr><td><b>Mobile No</b></td><td>: " + mobileNo + "</td></tr>");
        out.println("<tr><td><b>Email ID</b></td><td>: " + email + "</td></tr>");
        out.println("<tr><td><b>Address</b></td><td>: " + address + "</td></tr>");
        out.println("<tr><td><b>City</b></td><td>: " + city + "</td></tr>");
        out.println("<tr><td><b>Country</b></td><td>: " + country + "</td></tr>");
        out.println("<tr><td><b>Pincode</b></td><td>: " + pincode + "</td></tr>");
        out.println("</table></body></html>");
    }
}
