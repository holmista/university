import java.util.regex.Matcher;
import java.util.regex.Pattern;

public class PhoneNumberRegex {
    private final String validOperators[] = {"599", "551", "579"};
    public boolean matchGeorgianMobileAnyOperator(String phoneNumber){
        String pattern = "^\\+995\\d{9}$";
        Pattern p = Pattern.compile(pattern);
        Matcher m = p.matcher(phoneNumber);
        return m.matches();
    }
    public boolean matchGeorgianMobileValidOperator(String phoneNumber){
        String prefixRegex = String.join("|", this.validOperators);
        String pattern = "^\\+995" + prefixRegex + "\\d{9}$";
        Pattern p = Pattern.compile(pattern);
        Matcher m = p.matcher(phoneNumber);
        return m.matches();
    }
}
