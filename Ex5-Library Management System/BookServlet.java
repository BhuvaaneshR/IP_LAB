import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/BookServlet")
public class BookServlet extends HttpServlet {
    private static final long serialVersionUID = 1L;

    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        String action = request.getParameter("action");

        switch (action) {
            case "add":
                addBook(request, response);
                break;
            case "edit":
                editBook(request, response);
                break;
            case "display":
                displayBooks(response);
                break;
            default:
                response.getWriter().println("Unknown action!");
                break;
        }
    }

    // Function to add a book
    private void addBook(HttpServletRequest request, HttpServletResponse response) throws IOException {
        String bookName = request.getParameter("book_name");
        String author = request.getParameter("author");
        String publisher = request.getParameter("publisher");
        String edition = request.getParameter("edition");
        String price = request.getParameter("price");
        String category = request.getParameter("category");

        Connection conn = null;
        PreparedStatement stmt = null;

        try {
            // Load MySQL JDBC driver
            Class.forName("com.mysql.jdbc.Driver");

            // Connect to MySQL (create database if it doesn't exist)
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/?user=root&password=password");
            createDatabaseAndTable(conn);

            // Connect to the LibraryDB database
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/LibraryDB", "root", "password");

            // Insert book data into the database
            String sql = "INSERT INTO BOOK (TITLE, AUTHOR, PUBLISHER, EDITION, PRICE, CATEGORY) VALUES (?, ?, ?, ?, ?, ?)";
            stmt = conn.prepareStatement(sql);
            stmt.setString(1, bookName);
            stmt.setString(2, author);
            stmt.setString(3, publisher);
            stmt.setString(4, edition);
            stmt.setString(5, price);
            stmt.setString(6, category);

            stmt.executeUpdate();
            response.getWriter().println("Book added successfully!");

        } catch (SQLException | ClassNotFoundException e) {
            e.printStackTrace();
            response.getWriter().println("Error adding book: " + e.getMessage());
        } finally {
            try {
                if (stmt != null) stmt.close();
                if (conn != null) conn.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }

    // Function to edit a book
    private void editBook(HttpServletRequest request, HttpServletResponse response) throws IOException {
        int accno = Integer.parseInt(request.getParameter("accno"));
        String bookName = request.getParameter("book_name");
        String author = request.getParameter("author");
        String publisher = request.getParameter("publisher");
        String edition = request.getParameter("edition");
        String price = request.getParameter("price");
        String category = request.getParameter("category");

        Connection conn = null;
        PreparedStatement stmt = null;

        try {
            // Load MySQL JDBC driver
            Class.forName("com.mysql.jdbc.Driver");

            // Connect to the LibraryDB database
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/LibraryDB", "root", "password");

            // Update book details in the database
            String sql = "UPDATE BOOK SET TITLE=?, AUTHOR=?, PUBLISHER=?, EDITION=?, PRICE=?, CATEGORY=? WHERE ACCNO=?";
            stmt = conn.prepareStatement(sql);
            stmt.setString(1, bookName);
            stmt.setString(2, author);
            stmt.setString(3, publisher);
            stmt.setString(4, edition);
            stmt.setString(5, price);
            stmt.setString(6, category);
            stmt.setInt(7, accno);

            stmt.executeUpdate();
            response.getWriter().println("Book updated successfully!");

        } catch (SQLException | ClassNotFoundException e) {
            e.printStackTrace();
            response.getWriter().println("Error updating book: " + e.getMessage());
        } finally {
            try {
                if (stmt != null) stmt.close();
                if (conn != null) conn.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }

    // Function to display all books
    private void displayBooks(HttpServletResponse response) throws IOException {
        Connection conn = null;
        Statement stmt = null;
        ResultSet rs = null;
        PrintWriter out = response.getWriter();

        try {
            // Load MySQL JDBC driver
            Class.forName("com.mysql.jdbc.Driver");

            // Connect to the LibraryDB database
            conn = DriverManager.getConnection("jdbc:mysql://localhost:3306/LibraryDB", "root", "password");

            // Select and display all books
            String sql = "SELECT * FROM BOOK";
            stmt = conn.createStatement();
            rs = stmt.executeQuery(sql);

            out.println("<h2>Book List:</h2>");
            out.println("<table border='1'>");
            out.println("<tr><th>Acc No</th><th>Title</th><th>Author</th><th>Publisher</th><th>Edition</th><th>Price</th><th>Category</th></tr>");

            while (rs.next()) {
                out.println("<tr><td>" + rs.getInt("ACCNO") + "</td><td>" + rs.getString("TITLE") + "</td><td>" +
                        rs.getString("AUTHOR") + "</td><td>" + rs.getString("PUBLISHER") + "</td><td>" +
                        rs.getString("EDITION") + "</td><td>" + rs.getDouble("PRICE") + "</td><td>" + rs.getString("CATEGORY") + "</td></tr>");
            }

            out.println("</table>");

        } catch (SQLException | ClassNotFoundException e) {
            e.printStackTrace();
            out.println("Error displaying books: " + e.getMessage());
        } finally {
            try {
                if (rs != null) rs.close();
                if (stmt != null) stmt.close();
                if (conn != null) conn.close();
            } catch (SQLException e) {
                e.printStackTrace();
            }
        }
    }

    // Function to create the database and table if not exists
    private void createDatabaseAndTable(Connection conn) throws SQLException {
        Statement stmt = null;
        try {
            stmt = conn.createStatement();
            // Create the database if it doesn't exist
            stmt.executeUpdate("CREATE DATABASE IF NOT EXISTS LibraryDB");

            // Use the database
            stmt.executeUpdate("USE LibraryDB");

            // Create the BOOK table if it doesn't exist
            String createBookTableSQL = "CREATE TABLE IF NOT EXISTS BOOK ("
                    + "ACCNO INT PRIMARY KEY AUTO_INCREMENT, "
                    + "TITLE VARCHAR(255), "
                    + "AUTHOR VARCHAR(255), "
                    + "PUBLISHER VARCHAR(255), "
                    + "EDITION VARCHAR(50), "
                    + "PRICE DECIMAL(10, 2), "
                    + "CATEGORY VARCHAR(100))";
            stmt.executeUpdate(createBookTableSQL);

        } finally {
            if (stmt != null) stmt.close();
        }
    }
}
