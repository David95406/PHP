import java.util.ArrayList;
import java.util.Arrays;
import java.util.Collections;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        //1 feladat
        System.out.println("1. feladat");
        Scanner s = new Scanner(System.in);
        System.out.print("Adja meg a kör sugarát: ");
        double korSugar = Double.parseDouble(s.next());
        System.out.println("Kor kerulete: " + (korSugar * 2 * Math.PI));
        System.out.println("Kor terulete: " + (korSugar * korSugar * Math.PI));

        //2 feladat
        System.out.println("\n2. feladat (csokkeno)");
        ArrayList<Integer> szamok = new ArrayList<>();
        System.out.println("Adjon meg 3 szamot!");
        for (int i = 0; i < 3; i++) {
            System.out.print("Adjon meg egy szamot! ");
            szamok.add(Integer.parseInt(s.next()));
        }
        Collections.sort(szamok);
        Collections.reverse(szamok);
        System.out.println("A számok csökkenő sorrendben: ");
        for (Integer szam : szamok) {
            System.out.print(szam + " ");
        }

        //3 feladat
        System.out.println("\n3. feladat(3szog)");
        int[] haromszog = new int[3];
        System.out.println("Adja meg a haromszog oldalait!");
        for (int i = 0; i < haromszog.length; i++) {
            System.out.println(i + 1 + ". oldal: ");
            haromszog[i] = Integer.parseInt(s.next());
        }
        if (haromszog[0] + haromszog[1] > haromszog[2] &&
                haromszog[1] + haromszog[2] > haromszog[0] &&
                haromszog[0] + haromszog[2] > haromszog[1]) {
            System.out.println("A haromszog megszerkeztheto!");
        } else {
            System.out.println("A haromszog nem megszerkeztheto!");
        }

        //4 feladat
        System.out.println("\n4. feladat(pozitiv?)");
        System.out.println("Adjon meg egy szamot!");
        int pnSzam = Integer.parseInt(s.next());
        if (pnSzam > 0) {
            System.out.println("A szam pozitiv!");
        } else if (pnSzam == 0) {
            System.out.println("A szam 0!");
        } else {
            System.out.println("A szam negativ!");
        }

        //5 feladat
        System.out.println("\n5. feladat (mertani kozep)");
        System.out.println("Adjon meg egy szamot!");
        int elsoSzam = Integer.parseInt(s.next());
        System.out.println("Adjon meg egy szamot!");
        int masodikSzam = Integer.parseInt(s.next());
        double mertaniKozep = (double) (elsoSzam + masodikSzam) / 2;
        System.out.println("A szamok mertani kozepe: " + mertaniKozep);

        //6 feladat
        System.out.println("\n6. feladat(hany jegyu)");
        System.out.println("Adjon meg egy szamot!");
        int hjSzam = Integer.parseInt(s.next());
        System.out.println("A szam: " + String.valueOf(hjSzam).length() + " jegyu");

        //7 feladat
        System.out.println("\n7. feladat");
        Kor k = new Kor(10, new double[]{0, 0});
        System.out.println(k);
        k.nagyit(3);
        System.out.println("Kor nagyitasa 3x: " + k);
        //felezes
        k.kicsinyit(0.5);
        System.out.println("Kor kicsinyitese a felere: " + k);

    }
}