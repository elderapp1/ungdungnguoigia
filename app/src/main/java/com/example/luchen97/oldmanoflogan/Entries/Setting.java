package com.example.luchen97.oldmanoflogan.Entries;

import android.graphics.drawable.Drawable;

/**
 * Created by LUCHEN97 on 3/27/2018.
 */

public class Setting {
    String title;
    int anInt;



    public Setting( int anInt,String title) {
        this.title = title;
        this.anInt = anInt;
    }

    public String getTitle() {
        return title;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public int getAnInt() {
        return anInt;
    }

    public void setAnInt(int anInt) {
        this.anInt = anInt;
    }
}
