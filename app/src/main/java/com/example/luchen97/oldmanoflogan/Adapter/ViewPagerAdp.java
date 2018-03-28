package com.example.luchen97.oldmanoflogan.Adapter;

import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentPagerAdapter;
import android.support.v4.app.FragmentStatePagerAdapter;
import android.support.v4.view.ViewPager;

import com.example.luchen97.oldmanoflogan.Fragment.FragFour;
import com.example.luchen97.oldmanoflogan.Fragment.FragOne;
import com.example.luchen97.oldmanoflogan.Fragment.FragThree;
import com.example.luchen97.oldmanoflogan.Fragment.FragTwo;

/**
 * Created by LUCHEN97 on 3/19/2018.
 */

public class ViewPagerAdp extends FragmentStatePagerAdapter {
    String data;

    public ViewPagerAdp(FragmentManager fm, String data) {
        super(fm);
        this.data = data;
    }

    @Override
    public Fragment getItem(int position) {
        Fragment fragment=null;
        switch (position){
            case 0:
                fragment=new FragOne();
                break;
            case 1:
                fragment=new FragTwo();
                break;
            case 2:
                fragment=new FragThree();
                Bundle bundle=new Bundle();
                bundle.putString("data",data);
                fragment.setArguments(bundle);
                break;
            case 3:
                fragment=new FragFour();
                break;
        }

        return fragment;
    }

    @Override
    public int getCount() {
        return 4;
    }

//    @Override
//    public CharSequence getPageTitle(int position) {
//        String title = "";
//        switch (position) {
//            case 0:
//                title="Home";
//                break;
//            case 1:
//                title="Two";
//                break;
//            case 2:
//                title="Three";
//                break;
//            case 3:
//                title="Four";
//                break;
//        }
//        return title;
//    }
}
