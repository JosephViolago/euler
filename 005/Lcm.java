public class Lcm
{
    public static int lcm(int x1, int x2)
    {
        if (x1 <= 0 || x2 <= 0)
        {
            String error = "Set cannot contain a negative number";
            throw new IllegalArgumentException(error);
        }

        int max, min;

        if (x1 > x2)
        {
            max = x1;
            min = x2;
        }
        else
        {
            max = x2;
            min = x1;
        }

        for (int i = 1; i <= min; i++)
        {
            if ((max * i) % min == 0)
            {
                return i * max;
            }
        }

        throw new Error("Cannot find the LCM of numbers " + x1 + " and " + x2);
    }

    public static int lcm(int[] x)
    {
        if (x.length < 2)
        {
            throw new Error("Method requires at least 2 numbers in array.");
        }

        int tmp = lcm(x[x.length - 1], x[x.length - 2]);

        for (int i = x.length - 3; i >= 0; i--)
        {
            if (x[i] <= 0)
            {
                String error = "Set cannot contain a negative number";
                throw new IllegalArgumentException(error);
            }

            tmp = lcm(tmp, x[i]);
        }

        return tmp;
    }

    public static void main(String args[])
    {
        int[] test = new int[20];

        for (int i = 0; i < 20; i++)
        {
            test[i] = i + 1;
        }

        System.out.println(lcm(test));
    }
}
