public class Main {
    public static void main(String args[]){
//        String line = "ab700cd";
//        String pattern = "(\\D+)(\\d+)(\\D+)";
//        Pattern r = Pattern.compile(pattern);
//        Matcher m = r.matcher(line);
//        if (m.find()) {
//            System.out.println("Found value: " + m.group(0) );
//            System.out.println("Found value: " + m.group(1) );
//            System.out.println("Found value: " + m.group(2) );
//            System.out.println("Found value: " + m.group(3) );
//        }else {
//            System.out.println("NO MATCH");
//        }
        EmailRegex emailRegex = new EmailRegex();
        System.out.println(emailRegex.matchAnyEmail("a@gmail.com"));
        System.out.println(emailRegex.matchGmail("a@yahoo.com"));

        PhoneNumberRegex phoneNumberRegex = new PhoneNumberRegex();
        System.out.println(phoneNumberRegex.matchGeorgianMobileAnyOperator("+995599121212"));
        System.out.println(phoneNumberRegex.matchGeorgianMobileAnyOperator("+997599121212"));
        System.out.println(phoneNumberRegex.matchGeorgianMobileValidOperator("+995123121212"));

    }

}
