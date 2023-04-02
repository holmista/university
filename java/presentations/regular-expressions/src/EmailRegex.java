import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class EmailRegex {
    public boolean matchAnyEmail(String email){
        String pattern = "^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$";
        Pattern p = Pattern.compile(pattern);
        Matcher m = p.matcher(email);
        return m.matches();
    }
    public boolean matchGmail(String email){
        String pattern = "^[A-Za-z0-9._%+-]+@gmail.com";
        Pattern p = Pattern.compile(pattern);
        Matcher m = p.matcher(email);
        return m.matches();
    }
}
