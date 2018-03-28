package com.example.luchen97.oldmanoflogan.Fragment;

import android.content.Context;
import android.net.Uri;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ListView;

import com.example.luchen97.oldmanoflogan.Adapter.SettingAdp;
import com.example.luchen97.oldmanoflogan.Entries.Setting;
import com.example.luchen97.oldmanoflogan.R;

import java.util.ArrayList;

public class FragFour extends Fragment {
    ListView listView;
    ArrayList<Setting> settings;
    SettingAdp settingAdp;

    public FragFour() {
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        View view = inflater.inflate(R.layout.fragment_frag_four, container, false);
        // Inflate the layout for this fragment
        listView = (ListView) view.findViewById(R.id.list_setting);
        settings=new ArrayList<>();
        Setting setting=new Setting(R.drawable.profile,"Profile");
        Setting setting1=new Setting(R.drawable.game,"Ex");
        Setting setting2=new Setting(R.drawable.game1,"Pr");
        Setting setting3=new Setting(R.drawable.game2,"Pr");
        settings.add(setting);
        settings.add(setting1);
        settings.add(setting2);
        settings.add(setting3);
        settingAdp=new SettingAdp(getContext(),settings);
        listView.setAdapter(settingAdp);

        return view;
    }

}
